<?php

//Local onde se Encontra o arquivo, sua localização.
namespace App\Http\Controllers;

//Chamada das Classses do Laravel.
use Illuminate\Http\Request as HttpRequest;
use Request;
use App\Http\Requests\DesafioRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


//Chamada das classes que contém acesso ao banco de dados / tabelas
use App\Desafio;


    /*
    |--------------------------------------------------------------------------
    | DesafioController
    |--------------------------------------------------------------------------
    | Esse Controler Lida com as requisições da página, listagem e entre outros
    */
 

class DesafioController extends Controller{

    //função construtor, que define somente usuários autenticados possuem acesso.
    public function __construct(){
        $this->middleware('auth');
    }

    //Função de pesquisa / listagem das tarefas
    public function listagemDesafio(){
        //table paginada por 20 elementos
        $desafio = Desafio::paginate(20);
    
        return view('listagem.desafio')->with(['desafio'=> $desafio]);
    }

    public function addTask($id){

        $tarefa = Desafio::find($id);

        if(empty($tarefa)){
            return view('register.task')->with('l', $tarefa);
        }

        return view('register.task')->with('l', $tarefa);
    }

    public function add(DesafioRequest $request, $id){

        if($id==0){
            Desafio::create($request->all());
        }else{
            Desafio::find($id)->update(Request::except($id));
        }
        return redirect()->action('DesafioController@addTask', $id = 0)->withInput(Request::only('nome'));
    }

}
