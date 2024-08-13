<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary(); // ID unik untuk karyawan
            $table->string('image')->nullable(); // URL foto karyawan
            $table->string('name'); // Nama karyawan
            $table->string('phone'); // No telepon karyawan
            $table->uuid('division_id'); // ID divisi karyawan
            $table->string('position'); // Jabatan karyawan
            $table->timestamps();

            // Foreign key constraint (opsional, jika ada tabel divisions)
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
