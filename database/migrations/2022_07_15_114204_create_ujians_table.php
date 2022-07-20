<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujians', function (Blueprint $table) {
            $table->id();
            $table->string('guru_id');
            $table->string('mata_pelajaran_id');
            $table->string('jenis_ujian_id');
            $table->string('judul');
            $table->date('tanggal');
            $table->timestamp('waktu')->nullable();
            $table->string('acak');
            $table->enum('status', ['publish', 'draft', 'passive'])->default('draft');
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
        Schema::dropIfExists('ujians');
    }
}
