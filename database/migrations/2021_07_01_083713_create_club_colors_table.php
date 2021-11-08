<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_colors', function (Blueprint $table) {
            $table->id();

            $table->foreignId('club_id')
            ->constrained('clubs')
            ->cascadeOnDelete();


            $table->foreignId('color_id')
            ->constrained('colors')
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
        Schema::dropIfExists('club_colors');
    }
}
