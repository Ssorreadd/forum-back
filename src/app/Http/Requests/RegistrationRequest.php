<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'locale' => ['nullable', 'string', 'max:2'],
            'tz' => ['nullable'],
            'username' => ['required', 'string', 'unique:u_users,username', 'max:32'],
            'email' => ['required', 'email', 'unique:u_users,email'],
            'password' => [
                'required',
                'max:20',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],

        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('attributes.email').__('errors.empty'),
            'email.email' => __('attributes.email').__('errors.email'),
            'email.unique' => __('attributes.email').__('errors.unique'),

            'username.required' => __('attributes.username').__('errors.empty'),
            'username.max' => __('attributes.username').__('errors.max.line', ['max' => 32]),
            //            'username.alpha_num' => __('attributes.username').__('errors.alpha_num'),
            'username.unique' => __('attributes.username').__('errors.unique'),

            'password.required' => __('attributes.password').__('errors.empty'),
            'password.min' => __('attributes.password').__('errors.min.line', ['min' => 8]),
            'password.max' => __('attributes.password').__('errors.max.line', ['max' => 20]),

            'locale.string' => __('attributes.locale').__('errors.types.string'),
            'locale.max' => __('attributes.locale').__('errors.max.line', ['max' => 2]),
        ];
    }
}
