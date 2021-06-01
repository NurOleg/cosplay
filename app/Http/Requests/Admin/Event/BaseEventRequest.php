<?php

namespace App\Http\Requests\Admin\Event;

use Illuminate\Foundation\Http\FormRequest;

class BaseEventRequest extends FormRequest
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
        return [
            //'slug'            => ['max:255'],
            //'active' => ['required'],
            'name'            => ['max:255'],
            'body'            => ['string'],
            //'preview_img_src' => ['string'],
            'preview_body'    => ['string'],
        ];
    }
}
