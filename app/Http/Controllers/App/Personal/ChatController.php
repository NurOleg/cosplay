<?php


namespace App\Http\Controllers\App\Personal;


use App\Events\MessageSent;
use App\Models\Chat;
use App\Models\Customer;
use App\Models\Executant;
use App\Models\Message;
use App\Services\App\PersonalService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    /**
     * @var PersonalService
     */
    protected PersonalService $personalService;

    /**
     * ChatController constructor.
     * @param PersonalService $personalService
     */
    public function __construct(PersonalService $personalService)
    {
        $this->personalService = $personalService;
    }

    /**
     * @param string|null $uuid
     * @return View
     */
    public function index(?string $uuid = null): View
    {
        $user = $this->personalService->getAuthenticatedUser();

        return view('app.personal.chat.index', compact('user'));
    }

    /**
     * @param string $uuid
     * @return Chat
     */
    public function getChatInfo(string $uuid): Chat
    {
        $user = $this->personalService->getAuthenticatedUser();

        if ($user instanceof Executant) {
            $relatedUser = 'customer';

        } elseif ($user instanceof Customer) {
            $relatedUser = 'executant';
        } else {
            abort(404);
        }

        $chat = Chat::with($relatedUser . '.image')->find($uuid);

        if ($relatedUser === 'executant') {
            $chat->customer_unreaded_messages_count = 0;
            $chat->save();
        } else {
            $chat->executant_unreaded_messages_count = 0;
            $chat->save();
        }

        $chat->user = $relatedUser === 'executant' ? $chat->executant : $chat->customer;

        return $chat;
    }

    public function fetchChats()
    {
        $user = $this->personalService->getAuthenticatedUser();

        $chatsQuery = Chat::query();

        if ($user instanceof Executant) {
            $relatedUser = 'customer';
            $chatsQuery
                ->whereExecutantId($user->id);

        } elseif ($user instanceof Customer) {
            $relatedUser = 'executant';
            $chatsQuery
                ->whereCustomerId($user->id);
        } else {
            abort(404);
        }

        $chatsQuery->with([$relatedUser . '.image', 'messages' => function ($query) {
            $query->orderBy('id', 'desc')->take(1)->get();
        }]);

        $chats = $chatsQuery->get();

        foreach ($chats as $chat) {
            $chat->user = $relatedUser === 'executant' ? $chat->executant : $chat->customer;
        }

        return $chats;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function fetchMessages(string $uuid)
    {
        $messages = Message::with(['customer.image', 'executant.image'])
            ->where('chat_id', $uuid)
            ->get();

        foreach ($messages as $message) {
            $message->user = $message->customer_id === null ? $message->executant : $message->customer;
        }

        return $messages;
    }

    /**
     * @param Request $request
     * @return string[]
     */
    public function sendMessage(Request $request)
    {
        $user = $this->personalService->getAuthenticatedUser();

        $chat = Chat::find($request->input('chat'));

        if ($user instanceof Executant) {
            $data['executant_id'] = $user->id;
            $data['customer_id'] = null;
            $chat->customer_unreaded_messages_count = $chat->customer_unreaded_messages_count + 1;
            $chat->save();
        } elseif ($user instanceof Customer) {
            $data['customer_id'] = $user->id;
            $data['executant_id'] = null;
            $chat->executant_unreaded_messages_count = $chat->executant_unreaded_messages_count + 1;
            $chat->save();
        } else {
            abort(404);
        }

        $data['message'] = $request->input('message');
        $data['chat_id'] = $chat->id;

        $message = $user->messages()->create($data);

        broadcast(new MessageSent($user, $message, $chat->id))->toOthers();

        return ['status' => 'Message Sent!'];
    }

    /**
     * @param Request $request
     */
    public function create(Request $request)
    {
        $customer = auth()->guard('customer')->user();

        $chat = Chat::create([
            'executant_id' => $request->get('executant_id'),
            'customer_id'  => auth()->guard('customer')->user()->id,
            'executant_unreaded_messages_count' => 1
        ]);

        $message = new Message([
            'executant_id' => null,
            'customer_id'  => auth()->guard('customer')->user()->id,
            'message'      => $request->get('message')
        ]);

        $chat->messages()->save($message);

        broadcast(new MessageSent($customer, $message, $chat->id))->toOthers();

        return redirect()->route('chat_index', ['chat' => $chat->id]);
    }
}
