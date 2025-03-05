<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'aluno'; // Nome da tabela no banco de dados

    protected $primaryKey = 'alu_id'; // Nome da chave primária

    public $incrementing = true; // Se a chave primária é auto-incrementada
    protected $keyType = 'int'; // Tipo da chave primária (inteiro)

    protected $fillable = [
        'alu_id',
        'alu_nome',
        'alu_nome_resp',
        'alu_tel_resp',
        'alu_email_resp',
        'alu_dtnasc', // Campo de data de nascimento
    ];
}

