<?php


namespace App\Services\App\Personal;

use App\Http\Requests\Admin\Garb\StoreNewsRequest;
use App\Http\Requests\Admin\Garb\UpdateNewsRequest;
use App\Http\Requests\App\Personal\Garb\StoreGarbRequest;
use App\Http\Requests\App\Personal\Garb\UpdateGarbRequest;
use App\Models\Garb;
use App\Models\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

;

final class GarbService
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Garb::with(['images', 'hero'])->whereExecutantId(auth()->guard('executant')->user()->id)->get();
    }

    /**
     * @param StoreGarbRequest $request
     * @return Garb
     */
    public function store(StoreGarbRequest $request): Garb
    {
        $authUser = auth()->guard('executant')->user();
        $data = $request->validated();
        $data['executant_id'] = $authUser->id;
        $files = $request->files->get('photo');

        $garb = new Garb($data);
        $garb->save();

        if (!empty($files)) {
            $images = [];
            foreach ($files as $k => $file) {
                /** @var UploadedFile $file */
                $storagePath = '/garb/' . $authUser->id . '/' . $file->getClientOriginalName();
                if (!Storage::disk('public')->put($storagePath, $file->getContent())) {
                    continue;
                }

                $images[] = new Image([
                    'order' => $k + 1,
                    'path'  => $storagePath
                ]);
            }
            $garb->images()->saveMany($images);
        }

        $createdGarb = Garb::with(['fandom', 'images', 'thematic', 'hero'])->find($garb->id);

        return $createdGarb;
    }

    /**
     * @param UpdateGarbRequest $request
     * @param Garb $garb
     * @return Garb
     */
    public function update(UpdateGarbRequest $request, Garb $garb): Garb
    {
        $updatedFiles = explode(',', $request->get('changed_files'));
        $authUser = auth()->guard('executant')->user();
        $files = $request->files->get('photo');

        if (!empty($updatedFiles)) {
            foreach ($updatedFiles as $file) {
                if (empty($file)) {
                    continue;
                }

                $imageToDelete = $garb
                    ->images()
                    ->whereOrder($file)
                    ->first();

                if ($imageToDelete !== null) {
                    $imageToDelete->delete();
                }
            }

            $images = [];
            foreach ($files as $k => $file) {
                /** @var UploadedFile $file */
                $storagePath = '/garb/' . $authUser->id . '/' . $file->getClientOriginalName();
                if (!Storage::disk('public')->put($storagePath, $file->getContent())) {
                    continue;
                }

                $images[] = new Image([
                    'order' => $k + 1,
                    'path'  => $storagePath
                ]);
            }
            $garb->images()->saveMany($images);
        }

        $garb->update($request->validated());

        return $garb;
    }

    /**
     * @param Garb $garb
     * @return bool
     */
    public function delete(Garb $garb): bool
    {
        return $garb->delete();
    }
}
