<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'documento',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'telefone',
        'email',
    ];
}
