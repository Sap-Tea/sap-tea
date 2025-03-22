<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comunicacao extends Model
{
        protected $table = 'comunicacao';
        protected $fillable=['precisa_comunicacao','entende_instrucao','recomenda_instrucao','fk_alu_id'];
        public $timestamps =false;
}
