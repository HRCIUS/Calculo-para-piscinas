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
            $table->float('alturaMax_em_cm');
            $table->float("alturamin_em_cm")->nullable();
            $table->float('largura_em_cm');
            $table->float("comprimento")->nullable();
            $table->float("margem_em_cm");
            $table->string("formato");
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
