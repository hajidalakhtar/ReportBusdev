<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTowerModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tower_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('report_id')->nullable();
            $table->string('Jumlah_Lantai')->nullable();
            $table->string('Jumlah_unit')->nullable();
            $table->string('Jumlah_Yang_di_huni')->nullable();
            $table->string('Jumlah_Tingkat_Okupansi')->nullable();
            $table->string('Jumlah_Unit_Area_Komersial')->nullable();
            $table->string('Tingkat_Okupansi')->nullable();
            $table->string('Jumlah_Kendaraan_Terdaftar')->nullable();
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
        Schema::dropIfExists('tower_models');
    }
}
