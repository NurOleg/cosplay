<?php

namespace App\Http\Requests\App\Event;

use Illuminate\Foundation\Http\FormRequest;

class ListEventRequest extends FormRequest
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
            'city'  => ['string', 'nullable'],
            'year'  => ['string', 'nullable'],
            'month' => ['string', 'nullable'],
        ];
    }
}
