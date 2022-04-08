<?php

namespace App\Http\Requests\Order;

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
            'phone' => 'required|string|min:11', 
            'email' => 'required|string|min:3', 
            'discription' => 'required|string|min:3'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'имя заказчика',
            'phone' => 'телефон',
            'email' => 'емеил',
            'discription' => 'описание'
        ];
    }
}
