<?php

namespace App\Http\Requests\Source;

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
            'name' => 'required|string|min:3',
            'urlSource' => 'required|string|min:3'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'источник',
            'urlSource' => 'ссылка на источник'
        ];
    }
}
