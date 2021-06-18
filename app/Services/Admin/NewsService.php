<?php


namespace App\Services\Admin;

use App\Http\Requests\Admin\News\StoreNewsRequest;
use App\Http\Requests\Admin\News\UpdateNewsRequest;
use App\Models\News;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;

final class NewsService
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return News::all();
    }

    /**
     * @param StoreNewsRequest $request
     * @return News
     */
    public function store(StoreNewsRequest $request): News
    {
        /** @var UploadedFile $file */
        $file = $request->file('preview_img_src');
        $path = Storage::disk('public')->put('/news/' . $request->get('slug'), $file);
        $active = $request->get('active') === 'on';
        $data = array_merge($request->all(), ['preview_img_src' => $path, 'active' => $active]);

        return News::create($data);
    }

    /**
     * @param UpdateNewsRequest $request
     * @param News $news
     * @return News
     */
    public function update(UpdateNewsRequest $request, News $news): News
    {
        if (!empty($request->file('preview_img_src'))) {

            Storage::disk('public')->delete($news->preview_img_src);

            $file = $request->file('preview_img_src');
            $path = Storage::disk('public')->put('/news/' . $request->get('slug'), $file);
            $extraData['preview_img_src'] = $path;
        }

        $extraData['active'] = $request->get('active') === 'on';
        $data = array_merge($request->all(), $extraData);

        $news->update($data);

        return $news;
    }

    /**
     * @param News $news
     * @return bool
     */
    public function delete(News $news): bool
    {
        return $news->delete();
    }

    /**
     * @param Request $request
     * @return string
     */
    public function storeImage(Request $request): string
    {
        /** @var UploadedFile $file */
        $file = $request->file('file');
        $path = Storage::disk('public')->put('/news', $file);

        return Storage::disk('public')->url($path);
    }
}
