<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'email' => 'required|string|min:3',
            'is_admin' => 'integer'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'источник',
            'email' => 'ссылка на источник',
            'is_admin' => 'роль'
        ];
    }
}
