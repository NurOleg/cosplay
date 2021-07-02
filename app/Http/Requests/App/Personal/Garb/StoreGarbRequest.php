<?php

namespace App\Http\Requests\App\Personal\Garb;

class StoreGarbRequest extends BaseGarbRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            //'thematic_id'        => ['required'],
            //'hero_id'            => ['required'],
            //'fandom_id'          => ['required'],
            'concretization'     => ['required'],
            'concretization_eng' => ['required'],
            'description'        => ['required'],
            'active'             => ['required'],
            'services'           => ['required'],
        ]);
    }
}
