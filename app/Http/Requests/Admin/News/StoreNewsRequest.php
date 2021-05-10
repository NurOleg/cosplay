<?php

namespace App\Http\Requests\Admin\News;

class StoreNewsRequest extends BaseNewsRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return array_merge(parent::rules(),
            [
                [
                    //'slug'            => ['required'],
                    //'active'          => ['required'],
                    //'name'            => ['required'],
                    //'body'            => ['required'],
                    //'preview_img_src' => ['required'],
                    //'preview_body'    => ['required'],
                ]
            ]);
    }
}
