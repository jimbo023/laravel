<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'category_id' => 'required|integer',
            'source_id' => 'required|integer',
            'title' => 'required|string|min:3|max:30',
            'author' => 'nullable|string|min:3|max:30', 
            'discription' => 'nullable|string|min:3',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => 'категория',
            'title' => 'наименование',
            'author' => 'автор',
            'discription' => 'описание',
            'image' => 'изображение'
        ];
    }
}
