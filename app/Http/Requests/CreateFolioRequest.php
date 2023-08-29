<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFolioRequest extends FormRequest
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
        'folio' => 'prohibited',
        'email' => 'required|email',
        'date' => 'required|date',  //Manual
        'recieves' => 'required', //Manual
        'position' => 'required', //Manual
        'subject' => 'required', //Manual
        'applicant_id' => 'required|exists:users,id', //Persona que pide el folio
        'area_id' => 'required|exists:areas,id', 
        'document_type' => 'required',
        'status' => 'prohibited', //Editable
        'cancelation' => 'prohibited', //Si se cancela se tiene que llenar
        'document' => 'prohibited',
        'request_id' => 'nullable|exists:requests,id'
        ];
    }

    public function attributes()
    {
        return [
            'folio' => 'Folio',
            'email' => 'Correo electrónico',
            'date' => 'Fecha',  //Manual
            'recieves' => 'Receptor', //Manual
            'position' => 'Cargo del receptor', //Manual
            'subject' => 'Asunto', //Manual
            'applicant_id' => 'Solicitante', //Persona que pide el folio
            'area_id' => 'Departamento', 
            'document_type' => 'Tipo de documento',
            'status' => 'Estado', //Editable
            'cancelation' => 'Motivo de cancelación', //Si se cancela se tiene que llenar
            'document' => 'Documento',
            'request_id' => 'Solicitud'
        ];    
    }
}
