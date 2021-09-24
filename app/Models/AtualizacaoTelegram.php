<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtualizacaoTelegram extends Model
{
    use HasFactory;

    protected $table = 'cire_backbone_atualizacoes_telegram';

    protected $fillable = [
        'numero_ta',
        'usuario_id',
        'data_hora',
        'tipo_bilhete',
        'rota_ponta_a',
        'rota_ponta_b',
        'trecho_ponta_a',
        'trecho_ponta_b',
        'possui_draco',
        'equipamentos_v1',
        'equipamentos_v2',
        'operadoras',
        'afetacao_voz',
        'afetacao_speedy',
        'afetacao_clientes',
        'lp',
        'ttmc',
        'status',
        'escalonamento'
    ];

    public $timestamps = false;
}
