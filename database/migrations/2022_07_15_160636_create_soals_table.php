<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->string('ujian_id');
            $table->longText('soal');
            $table->string('image')->nullable();
            $table->longText('pilihan1');
            $table->longText('pilihan2');
            $table->longText('pilihan3');
            $table->longText('pilihan4');
            $table->enum('kunci', ['pilihan1', 'pilihan2', 'pilihan3', 'pilihan4']);
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
        Schema::dropIfExists('soals');
    }
}
