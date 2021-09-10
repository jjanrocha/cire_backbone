<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    use HasFactory;

    protected $table = 'cire_backbone_atividades';

    protected $fillable = ['usuario_id', 'data_hora', 'numero_ta', 'tipo_atividade_id', 'carimbo'];

    public $timestamps = false;
}
