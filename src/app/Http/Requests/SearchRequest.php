<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'search_by' => ['nullable'],
            'order_type' => ['nullable'],
            'username' => ['nullable', 'string', 'exists:u_users,username'],
            'category_id' => ['nullable', 'integer', 'exists:blog_categories,id'],
        ];
    }
}
