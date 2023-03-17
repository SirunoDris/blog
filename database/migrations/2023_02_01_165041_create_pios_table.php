<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('message'); //el mensaje que enviamos y lo guarda
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); //la clave foranea
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pios');
    }
};
