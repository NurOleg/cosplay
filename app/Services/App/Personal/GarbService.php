<?php


namespace App\Services\App\Personal;

use App\Http\Requests\Admin\Garb\StoreNewsRequest;
use App\Http\Requests\Admin\Garb\UpdateNewsRequest;
use App\Http\Requests\App\Personal\Garb\StoreGarbRequest;
use App\Http\Requests\App\Personal\Garb\UpdateGarbRequest;
use App\Models\Fandom;
use App\Models\Garb;
use App\Models\Hero;
use App\Models\Image;
use App\Models\Thematic;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use function React\Promise\all;

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

        if ($request->get('fandom_id') === null) {
            $fandom = Fandom::create([
                'name_ru'  => $request->get('world'),
                'name_eng' => $request->get('worldEn'),
                'code'     => self::slugify($request->get('worldEn'), '_'),
                'is_new' => true
            ]);

            $data['fandom_id'] = $fandom->id;
        }

        if ($request->get('hero_id') === null) {
            $hero = Hero::create([
                'name_ru'  => $request->get('hero'),
                'name_eng' => $request->get('heroEn'),
                'code'     => self::slugify($request->get('heroEn'), '_'),
                'is_new' => true
            ]);

            $data['hero_id'] = $hero->id;
        }

        if ($request->get('thematic_id') === null) {
            $thematic = Thematic::create([
                'name_ru'  => $request->get('thematic'),
                'name_eng' => $request->get('thematicEn'),
                'code'     => self::slugify($request->get('thematicEn'), '_'),
                'is_new' => true
            ]);

            $data['thematic_id'] = $thematic->id;
        }


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

    public static function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}
