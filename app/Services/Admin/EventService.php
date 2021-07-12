<?php


namespace App\Services\Admin;

use App\Http\Requests\Admin\Event\StoreEventRequest;
use App\Http\Requests\Admin\Event\UpdateEventRequest;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

final class EventService
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Event::all();
    }

    /**
     * @param StoreEventRequest $request
     * @return Event
     */
    public function store(StoreEventRequest $request): Event
    {
        $d = [];

        foreach ($request->get('programm_dates') as $k => $item) {

            if (empty($request->get('programm_names')[$k])) {
                continue;
            }

            $dt = Carbon::parse($item);
            $dts = $dt->day . '.' . $dt->month . '.' . $dt->year;

            $d[$dts]['date'] = $dts;
            $d[$dts]['extra'][$k]['time'] = $dt->hour . ':' . $dt->minute;
            $d[$dts]['extra'][$k]['name'] = $request->get('programm_names')[$k];
        }

        $json = array_values($d);

        if (!empty($json)) {
            foreach ($json as $k => $v) {
                $json[$k]['extra'] = array_values($json[$k]['extra']);
            }
        }

        $requestPoint = str_contains($request->get('point'), ',')
            ? str_replace(',', ' ', $request->get('point'))
            : $request->get('point');

        $point = DB::raw("ST_GeomFromText('POINT({$requestPoint})')");

        $images = [];
        /** @var UploadedFile $file */
        $file = $request->file('image');

        $path = '/event/' . $request->get('name') . '/' . $file->getClientOriginalName();
        Storage::disk('public')->put($path, $file->getContent());

        $active = $request->get('active') === 'on';

        $data = array_merge($request->all(), [
            'image_src' => $path,
            'active'    => $active,
            'programm'  => json_encode($json),
            'point'     => $point
        ]);

        $event = Event::create($data);

        $images[] = new Image([
            'order' => 1,
            'path'  => $path
        ]);

        $sliderImages = $request->file('images');

        if (!empty($sliderImages)) {
            $k = 1;
            foreach ($sliderImages as $file) {
                $k = $k + 1;
                /** @var UploadedFile $file */
                $storagePath = '/event/' . $request->get('name') . '/' . $file->getClientOriginalName();
                if (!Storage::disk('public')->put($storagePath, $file->getContent())) {
                    continue;
                }

                $images[] = new Image([
                    'order' => $k,
                    'path'  => $storagePath
                ]);
            }

            $event->images()->saveMany($images);
        }

        return $event;
    }

    /**
     * @param UpdateEventRequest $request
     * @param Event $event
     * @return Event
     */
    public function update(UpdateEventRequest $request, Event $event): Event
    {
        /** @var UploadedFile $file */
        $file = $request->file('image');
        $images = [];
        $extra = [];

        if (!empty($file)) {
            $path = '/event/' . $event->name . '/' . $file->getClientOriginalName();

            if (!Storage::disk('public')->exists($path)) {
                $mainImage = $event->images()->whereOrder(1)->first();
                Storage::disk('public')->delete($mainImage->path);
                $mainImage->delete();

                Storage::disk('public')->put($path, $file->getContent());
                $images[] = new Image([
                    'order' => 1,
                    'path'  => $path
                ]);
            }

            $extra['path'] = $path;
        }

        foreach ($request->get('programm_dates') as $k => $item) {

            if (empty($request->get('programm_names')[$k])) {
                continue;
            }

            $dt = Carbon::parse($item);
            $dts = $dt->day . '.' . $dt->month . '.' . $dt->year;

            $d[$dts]['date'] = $dts;
            $d[$dts]['extra'][$k]['time'] = $dt->hour . ':' . $dt->minute;
            $d[$dts]['extra'][$k]['name'] = $request->get('programm_names')[$k];
        }

        $json = array_values($d);

        if (!empty($json)) {
            foreach ($json as $k => $v) {
                $json[$k]['extra'] = array_values($json[$k]['extra']);
            }
        }
dd($json);
        $active = $request->get('active') === 'on';
        $extra['active'] = $active;
        $extra['programm'] = $json;

        $data = array_merge($request->all(), $extra);

        $event->update($data);
        $event->images()->saveMany($images);

        return $event;
    }

    /**
     * @param Event $event
     * @return bool
     */
    public function delete(Event $event): bool
    {
        $imagesQuery = $event->images();

        $images = $imagesQuery->get();

        foreach ($images as $image) {
            Storage::disk('public')->delete($image->path);
        }

        $imagesQuery->delete();

        return $event->delete();
    }
}
