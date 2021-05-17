<?php


namespace App\Services\App;


use App\Models\Image;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Http\Requests\App\Personal\UserSettingsRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

final class PersonalService
{
    /**
     * @return Authenticatable|null
     */
    public function getAuthenticatedUser(): ?Authenticatable
    {
        if (auth()->guard('executant')->user() !== null) {
            return auth()->guard('executant')->user()->load('image');
        }

        if (auth()->guard('customer')->user() !== null) {
            return auth()->guard('customer')->user()->load('image');
        }

        return null;
    }

    /**
     * @param UserSettingsRequest $request
     * @return mixed
     */
    public function updateUser(UserSettingsRequest $request)
    {
        $type = $request->get('type');
        $model = 'App\\Models\\' . ucfirst($type);
        $authUser = auth()->guard($type)->user();
        $user = $model::whereId($authUser->id)->first();

        if ($request->files->count() > 0) {

            /** @var UploadedFile $file */
            $file = $request->file('image');
            $path = Storage::disk('public')->put('/' . $type . '/' . $authUser->id, $file);

            $user
                ->image()
                ->save(
                    new Image([
                        'order' => 1,
                        'path'  => $path
                    ])
                );
        }

        $user->fill($request->validated());
        $user->save();
        //$user->image()->save();

        return $user;
    }
}
