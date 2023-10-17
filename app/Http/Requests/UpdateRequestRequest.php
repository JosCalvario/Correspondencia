<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestRequest extends FormRequest
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
        'name'=>'prohibited',
        'document_type'=>'required',
        'date'=>'required|date',
        'number'=>'required',
        'sender'=>'required',
        'subject'=>'required',
        'assigned_area'=>'required|exists:areas,id',
        'observations'=>'required|max:200',
        'document' => 'nullable|file'
        ];
    }

    function attributes() {
        return [
            'document_type'=>'Tipo de documento',
            'date'=>'Fecha',
            'number'=>'Número',
            'sender'=>'Emisor',
            'subject'=>'Asunto',
            'assigned_area'=>'Área asignada',
            'observations'=>'Observaciones',
            'document' => 'Documento'
        ];
    }
}
