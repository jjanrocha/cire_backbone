<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAtividade extends Model
{
    use HasFactory;

    protected $table = 'cire_backbone_tipos_atividades';

    protected $fillable = ['categoria', 'tipo_carimbo', 'via_telegram'];

    public $timestamps = false;
}
