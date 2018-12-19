<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desafio extends Model
{
    protected $connection = 'mysql';

    public $timestamps = true;

    protected $primaryKey = 'id';

    protected $table = 'desafios';

    protected $fillable = array('id', 'nome', 'descricao', 'prazo', 'concluida');

    protected $guarded = ['id'];
}
