<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAtividades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cire_backbone_atividades', function (Blueprint $table) {
            $table->id();
            $table->string('usuario_id', 250);
            $table->dateTime('data_hora');
            $table->string('numero_ta', 250);
            $table->unsignedBigInteger('tipo_atividade_id');
            $table->text('carimbo');

            $table->foreign('usuario_id')->references('id')->on('cire_backbone_usuarios');
            $table->foreign('tipo_atividade_id')->references('id')->on('cire_backbone_tipos_atividades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cire_backbone_atividades');
    }
}
