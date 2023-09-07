<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResponseRequest extends FormRequest
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
            'id' => 'required|exists:responses,id',
            'folio' => 'required|exists:responses,folio',
            // 'email' => 'required|email',
            // 'date' => 'required|date',  //Manual
            // 'recieves' => 'required', //Manual
            // 'position' => 'required', //Manual
            // 'subject' => 'required', //Manual
            // 'applicant_id' => 'required|exists:users,id', //Persona que pide el folio
            // 'area_id' => 'required|exists:areas,id', 
            // 'document_type' => 'required',
            'status' => 'prohibited', //Editable
            'cancelation' => 'prohibited', //Si se cancela se tiene que llenar
            'document' => 'required|file',
            // 'request_id' => 'nullable|exists:requests,id'
        ];
    }
}
