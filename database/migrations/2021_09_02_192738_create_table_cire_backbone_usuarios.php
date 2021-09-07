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
            $table->bigInteger('id')->primary()->unique();
            $table->string('nome', 120);
            $table->string('password', 120);
            $table->string('nivel', 20);
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
