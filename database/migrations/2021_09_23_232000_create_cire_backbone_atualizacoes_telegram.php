<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCireBackboneAtualizacoesTelegram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cire_backbone_atualizacoes_telegram', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_ta');
            $table->string('usuario_id', 250);
            $table->dateTime('data_hora');
            $table->string('tipo_bilhete', 150);
            $table->string('rota_ponta_a', 250);
            $table->string('rota_ponta_b', 250)->nullable();
            $table->string('trecho_ponta_a', 250);
            $table->string('trecho_ponta_b', 250)->nullable();
            $table->string('possui_draco', 4)->nullable();
            $table->string('equipamentos_v1', 250)->nullable();
            $table->string('equipamentos_v2', 250)->nullable();
            $table->string('redundancias_v2', 250)->nullable();
            $table->string('operadoras', 250)->nullable();
            $table->integer('afetacao_erbs')->nullable();
            $table->integer('afetacao_voz')->nullable();
            $table->integer('afetacao_speedy')->nullable();
            $table->integer('afetacao_clientes')->nullable();
            $table->integer('afetacao_fttx')->nullable();
            $table->string('lp', 250)->nullable();
            $table->string('horario_acionamento', 250);
            $table->string('ttmc', 250)->nullable();
            $table->text('status');
            $table->string('escalonamento', 250);

            $table->foreign('usuario_id')->references('id')->on('cire_backbone_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cire_backbone_atualizacoes_telegram');
    }
}
