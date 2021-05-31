<?php

namespace App\Http\Requests\App\Personal;

use Illuminate\Foundation\Http\FormRequest;

class UserSettingsRequest extends FormRequest
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
        $extraRules = $this->get('type') === 'executant'
            ? self::executantRules()
            : self::customerRules();

        return array_merge($extraRules, [
            'email'       => ['string', 'email', 'max:255', 'nullable'],
            'phone'       => ['string', 'min:8', 'nullable'],
            'city'        => ['string', 'nullable'],
            'description' => ['string', 'nullable'],
            'image'       => ['max:500', 'image', 'nullable'],
        ]);
    }

    private static function executantRules(): array
    {
        return [
            'fullname'     => ['string', 'nullable'],
            'sex'          => ['string', 'in:male,female', 'nullable'],
            'nickname'     => ['string', 'nullable'],
            'nickname_eng' => ['string', 'nullable'],
            'country'      => ['string', 'nullable'],
            'city'         => ['string', 'nullable'],
        ];
    }

    private static function customerRules(): array
    {
        return [
            'name'         => ['string', 'nullable'],
            'organization' => ['string', 'nullable'],
            'country'      => ['string', 'nullable'],
            'city'         => ['string', 'nullable'],
        ];
    }
}
