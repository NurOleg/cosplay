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
            'email'       => ['string', 'email', 'max:255'],
            'phone'       => ['string', 'min:8'],
            'city'        => ['string'],
            'description' => ['string'],
            'image'       => ['max:500', 'image'],
        ]);
    }

    private static function executantRules(): array
    {
        return [
            'fullname'     => ['string'],
            'sex'          => ['string', 'in:male,female'],
            'nickname'     => ['string'],
            'nickname_eng' => ['string'],
            'country'      => ['string'],
            'city'         => ['string'],
        ];
    }

    private static function customerRules(): array
    {
        return [
            'name'         => ['string'],
            'organization' => ['string'],
            'country'      => ['string'],
            'city'         => ['string'],
        ];
    }
}
