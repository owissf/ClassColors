<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubcolorsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubcolors_students', function (Blueprint $table) {
            $table->id();

            $table->foreignId('clubcolor_id')
            ->constrained('club_colors')
            ->cascadeOnDelete();


            $table->foreignId('student_id')
            ->constrained('students')
            ->cascadeOnDelete();

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
        Schema::dropIfExists('clubcolors_students');
    }
}
