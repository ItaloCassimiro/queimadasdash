<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('queimadas', function (Blueprint $table) {
        $table->id();
        $table->string('unidade_conservacao');
        $table->string('ngi');
        $table->string('gr')->nullable();

        $table->float('incendio_ha')->nullable();
        $table->float('queima_prescrita_ha')->nullable();
        $table->float('queima_controlada_ha')->nullable();
        $table->float('aceiro_ha')->nullable();
        $table->float('fogo_natural_ha')->nullable();
        $table->float('indigenas_isolados_ha')->nullable();
        $table->float('total_prevencao_ha')->nullable();
        $table->float('total_combate_ha')->nullable();
        $table->float('area_total_ha')->nullable();
        $table->float('area_uc_ha')->nullable();
        $table->float('percentual_aaf_na_uc')->nullable();

        $table->integer('ano')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queimadas');
    }
};
