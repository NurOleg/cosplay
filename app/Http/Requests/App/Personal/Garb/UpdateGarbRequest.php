<?php

namespace App\Http\Requests\App\Personal\Garb;

class UpdateGarbRequest extends BaseGarbRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'changed_files' => ['string', 'nullable'],
        ]);
    }
}
