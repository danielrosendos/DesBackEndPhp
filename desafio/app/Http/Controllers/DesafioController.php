<?php

//Local onde se Encontra o arquivo, sua localização.
namespace App\Http\Controllers;

//Chamada das Classses do Laravel.
use Illuminate\Http\Request;
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
            return view('register.task')->with('1', $tarefa);
        }

        return view('register.task')->with('1', $tarefa);
    }

    public function attStatus(Request $request){
        $aux = $request->id;
        

        if(empty($aux)){
            return CatracaControler::chamados();
        }

        Contato::find($aux)->update(['status' => 1]);

        return CatracaControler::chamados();
    }

    public function removeStatus(Request $request){

        if(empty($request->id)){
            return CatracaControler::chamados();
        }

        Contato::find($request->id)->delete();

        return CatracaControler::chamados();
    }

}
