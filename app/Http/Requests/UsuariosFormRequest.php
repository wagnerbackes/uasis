<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosFormRequest extends FormRequest
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
            'nome' => 'required|max:191',
            'email' => 'required|max:191|email|unique:App\Models\Aluno,email',
            'login' => 'required|min:3|unique:App\Models\Usuario,login',
            'status'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => "O campo :attribute é obrigatório",
            'nome.max'=> "O campo nome deve ter no maximo 191 carateres"
        ];
    }
}
