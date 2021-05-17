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
            'thematic_id'        => ['exists:thematics,id'],
            'hero_id'            => ['exists:heroes,id'],
            'fandom_id'          => ['exists:fandoms,id'],
            'concretization'     => ['string'],
            'concretization_eng' => ['string'],
            'description'        => ['string'],
            'active'             => ['numeric'],
        ];
    }
}
