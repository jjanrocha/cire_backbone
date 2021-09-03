<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCireBackboneUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cire_backbone_usuarios', function (Blueprint $table) {
            $table->string('re_usuario', 120)->primary();
            $table->string('nome', 120);
            $table->string('senha', 120);
            $table->string('nivel', 10);
            $table->string('email')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cire_backbone_usuarios');
    }
}
