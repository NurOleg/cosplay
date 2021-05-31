<?php

namespace App\Http\Requests\App\Login;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email_or_phone'   => ['required', 'string'],
            'password'         => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', 'string', 'min:8'],
            'agree_services'   => ['required'],
            'agree_data'       => ['required'],
            //'sex'              => ['required', 'in:male,female'],
            'type'             => ['required', 'in:customer,executant'],
        ];
    }
}
