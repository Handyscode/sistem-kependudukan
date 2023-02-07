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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->char('id_penduduk', 6)->unique();
            $table->char('id_user', 6)->constrained('users');
            $table->char('nik', 16)->unique();
            $table->char('no_kk', 16);
            $table->string('nama', 50);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('alamat');
            $table->char('rt', 3);
            $table->char('rw', 3);
            $table->string('foto_ktp');
            $table->string('foto_kk');
            $table->string('status', 20);
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
        Schema::dropIfExists('penduduks');
    }
};
