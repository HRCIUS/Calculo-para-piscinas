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
        Schema::create('piscinas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string("local");
            $table->float('altura_em_cm');
            $table->float('largura_em_cm');
            $table->float("volume");
            $table->float("margem_em_cm");
            $table->string("formato");
            $table->string("quant_total_cloro");
            $table->string("quant_total_clarificante");
            $table->string("controle_de_ph");
            $table->string("quant_total_sulfato");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('piscinas');
    }
};
