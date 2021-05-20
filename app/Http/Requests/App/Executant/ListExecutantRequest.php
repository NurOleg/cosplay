<?php

namespace App\Http\Requests\App\Executant;

use Illuminate\Foundation\Http\FormRequest;

class ListExecutantRequest extends FormRequest
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
    public function rules()
    {
        return [
            'fandom'   => ['string'],
            'hero'     => ['string'],
            'thematic' => ['string'],
            'city'     => ['string'],
            'nickname' => ['string'],
            'name'     => ['string'],
            'sex'      => ['string','in:male,female'],
        ];
    }
}
