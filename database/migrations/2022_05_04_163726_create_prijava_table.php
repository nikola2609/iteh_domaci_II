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
        Schema::create('prijava', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('ispit_id');
            $table->string('ispitni_rok');
            $table->date('datum_prijave');
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
        Schema::dropIfExists('prijava');
    }
};
