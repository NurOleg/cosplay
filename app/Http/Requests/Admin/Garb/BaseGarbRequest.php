<?php

namespace App\Http\Requests\Admin\Garb;

use Illuminate\Foundation\Http\FormRequest;

class BaseGarbRequest extends FormRequest
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
            'name_ru'  => ['string'],
            'name_eng' => ['string'],
            'code'     => ['string'],
            'active'   => ['required'],
        ];
    }
}
