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
            'email'       => ['string', 'email', 'max:255', 'required'],
            'phone'       => ['string', 'min:8', 'nullable'],
            'city_id'     => ['string'],
            'description' => ['string', 'required'],
            'image'       => ['max:500', 'image'],
        ]);
    }

    private static function executantRules(): array
    {
        return [
            'fullname'     => ['string', 'required'],
            'sex'          => ['string', 'in:male,female', 'required'],
            'nickname'     => ['string', 'required'],
            'nickname_eng' => ['string', 'required'],
            'country'      => ['string', 'required'],
            'specialities' => ['array'],
            'twitter'      => ['string', 'nullable'],
            'instagram'    => ['string', 'nullable'],
            'facebook'     => ['string', 'nullable'],
            'youtube'      => ['string', 'nullable'],
            'vk'           => ['string', 'nullable'],
        ];
    }

    private static function customerRules(): array
    {
        return [
            'name'         => ['string', 'required'],
            'organization' => ['string', 'required'],
            'country'      => ['string', 'required'],
        ];
    }
}
