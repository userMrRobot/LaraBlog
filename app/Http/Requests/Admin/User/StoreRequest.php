<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
//            'password' => 'required|string',
            'role' => 'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'required' => 'Поле обязательно к заполнению',
            'string' => 'Только строки',
            'unique' => 'Введите другой email'
        ];
    }
}
