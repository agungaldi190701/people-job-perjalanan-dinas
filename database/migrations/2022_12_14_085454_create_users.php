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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->nullable();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('foto');
            $table->string('nohp');
            $table->enum('jenis_anggota', ['pns', 'honorer', 'biasa']);
            $table->enum('jabatan', ['anggota', 'admin', 'ketua']);
            $table->string('username')->unique();
            $table->string('password');

            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
