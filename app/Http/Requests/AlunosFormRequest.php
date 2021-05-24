<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunosFormRequest extends FormRequest
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
        //foi instalado o  laravellegends/pt-br-validator pelo composer para validar o CPF
        //https://github.com/LaravelLegends/pt-br-validator
        return [
            'nome' => 'required|max:191',
            'email' => 'required|max:191|email|unique:App\Models\Aluno,email',
            'cpf' => 'required|cpf|unique:App\Models\Aluno,cpf',
            'celular' => 'celular_com_ddd',
            'data_nascimento' => 'required|date_format:"d/m/Y"'
        ];
    }

    public function messages()
    {
        return [
            'nome:required' => "O campo nome é obrigatório",
            'nome.max'=> "O campo nome deve ter no maximo 191 carateres",
            'email.required' => "O campo email é obrigatório",
            'email.email' => "Insira um email válido",
            'email.max'=> "O campo email deve ter no maximo 191 carateres",
            'email.unique'=> "O email já está cadastrado",
            'cpf.required' => "O campo cpf é obrigatório",
            'cpf.cpf'=> "Insira um CPF válido",
            'cpf.unique'=> "O cpf já está cadastrado",
            'celular.celular_com_ddd'=> "O campo celular deve ter 14 digitos",
            'data_nascimento.required' => "O campo data de nascimento é obrigatório",
            'data_nascimento.date_format' => "O campo data de nascimento deve seguir o formato 30/12/2000"
        ];
    }
}
