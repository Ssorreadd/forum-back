<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['email', 'required', 'exists:u_users,email'],
            'locale' => ['required', 'string', 'max:2'],
            'password' => ['required', 'min:8'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('attributes.email').__('errors.empty'),
            'email.email' => __('attributes.email').__('errors.email'),
            'email.exists' => __('attributes.email').__('errors.exist'),

            'locale.required' => __('attributes.locale').__('errors.empty'),
            'locale.string' => __('attributes.locale').__('errors.types.string'),
            'locale.max' => __('attributes.locale').__('errors.max.line', ['max' => 2]),

            'password.required' => __('attributes.password').__('errors.empty'),
            'password.min' => __('attributes.password').__('errors.min.line', ['min' => 8]),
        ];
    }
}
