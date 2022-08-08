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
        Schema::create('permintaan_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('judul');
            $table->string('pengantar');
            $table->string('proposal');
            $table->string('pernyataan');
            $table->string('file_pendukung_satu')->nullable();
            $table->string('file_pendukung_dua')->nullable();
            $table->enum('unsur_iklim', ['Informasi Hari Tanpa Hujan', 'Buletin Iklim', 'Informasi Hujan Bulanan', 'Informasi Hujan Dasarian', 'Indeks Presipitasi Terstandarisasi', 'Prakiraan Hujan Bulanan', 'Prakiraan Hujan Dasarian', 'Prakiraan Musim', 'Potensi Banjir Dasarian']);
            $table->boolean('status');
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
        Schema::dropIfExists('permintaan_data');
    }
};
