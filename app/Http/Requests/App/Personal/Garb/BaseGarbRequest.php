<?php

namespace App\Http\Requests\App\Personal\Garb;

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
            'thematic_id'        => ['string', 'nullable'],
            'hero_id'            => ['string', 'nullable'],
            'fandom_id'          => ['string', 'nullable'],
            'concretization'     => ['string', 'nullable'],
            'concretization_eng' => ['string', 'nullable'],
            'description'        => ['string', 'nullable'],
            'services'           => ['array', 'nullable'],
            'active'             => ['numeric'],
        ];
    }
}
