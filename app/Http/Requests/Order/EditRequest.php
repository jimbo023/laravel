<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string|min:3', 
            'phone' => 'required|string|min:11', 
            'email' => 'required|string|min:3', 
            'discription' => 'required|string|min:3',
            'status' => 'required|string'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'имя заказчика',
            'phone' => 'телефон',
            'email' => 'емеил',
            'discription' => 'описание',
            'status' => 'статус'
        ];
    }
}
