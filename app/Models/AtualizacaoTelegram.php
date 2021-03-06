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
        'redundancias_v2',
        'operadoras',
        'afetacao_erbs',
        'afetacao_voz',
        'afetacao_speedy',
        'afetacao_clientes',
        'afetacao_fttx',
        'afetacao_iptv',
        'lp',
        'horario_acionamento',
        'ttmc_numero',
        'ttmc_tipo',
        'ttmc_rede',
        'status',
        'escalonamento',
        'tipo_status'
    ];

    //Fazer com que o eloquent entenda que os campos deverão ser tratados como array
    protected $casts = [
        'equipamentos_v1' => 'array',
        'equipamentos_v2' => 'array',
        'operadoras' => 'array',
    ];

    public $timestamps = false;
}
