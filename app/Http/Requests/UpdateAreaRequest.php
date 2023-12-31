<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAreaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'name'=>'required',
        'manager_id'=>'nullable|exists:users,id',
        'phone'=>'required',
        'address'=>'required',
        'unit_id'=>'required|exists:units,id'
        ];
    }

    function attributes() {
        return [
            'name'=>'Nombre de área',
            'manager_id'=>'Gerente',
            'phone'=>'Número telefónico',
            'address'=>'Dirección',
            'unit_id'=>'Departamento'
            ];
    }
}
