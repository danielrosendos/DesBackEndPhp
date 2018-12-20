<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DesafioRequest extends FormRequest
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

    public function __construct()
    {
        //Banco de dados Padrão MYSQL
        DB::setDefaultConnection('mysql');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required | max: 100',
            'descricao' => 'required|string|max:255',
            'prazo' => 'required | date |after:today',
            'prioridade' => 'required | max: 100'
        ];
    }

    public function messages(){
        return[
            'required' => 'O campo :attribute não podem estar vazios',
            'prazo.before'=> 'A Data tem que ser Atual ou Posterior',
        ];
    }
}
