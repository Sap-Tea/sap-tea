<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfilEstudante extends Model
{
    protected $table = 'perfil_estudante';
    protected $fillable = ['diag_laudo', 'cid','nome_medico','data_laudo'];
    public $timestamps = false; // Desabilita o uso de timestamps
}

