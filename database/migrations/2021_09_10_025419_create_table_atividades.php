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
            $table->string('data_hora', 120);
            $table->string('numero_ta', 250);
            $table->string('tipo_carimbo_id', 250);
            $table->string('carimbo', 250);

            $table->foreign('usuario_id')->references('id')->on('cire_backbone_usuarios');
            $table->foreign('tipo_carimbo_id')->references('id')->on('cire_backbone_usuarios');
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
