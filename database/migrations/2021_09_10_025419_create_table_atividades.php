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
            $table->string('id_usuario', 250);
            $table->string('data_hora', 120);
            $table->string('numero_ta', 250);
            $table->string('tipo_carimbo', 250);
            $table->string('carimbo', 250);
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
