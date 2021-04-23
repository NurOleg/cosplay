<?php

namespace App\Http\Requests\Admin\Thematic;

class StoreThematicRequest extends BaseThematicRequest
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
                    'name_ru'  => ['required'],
                    'name_eng' => ['required'],
                    'code'     => ['required'],
                ]
            ]);
    }
}
