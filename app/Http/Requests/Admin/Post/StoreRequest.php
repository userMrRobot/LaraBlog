<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file|image|mimes:jpeg,jpg',
            'main_image' => 'required|file|image|mimes:jpeg,jpg',
            'category_id' => 'required|exists:categories,id',
        ];
    }
    public function messages(): array
    {
        return [
            'required' => 'Поле обязательно к заполнению',
            'string' => 'Только строки',
            'file' => 'Не тот тип данных',
            'image' => 'Только картинки',
            'mimes' => 'Разрешено загружать только файлы jpeg,jpg'
        ];
    }
}
