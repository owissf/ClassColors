<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_colors', function (Blueprint $table) {
            $table->id();

            $table->foreignId('color_id')
            ->constrained('colors')
            ->cascadeOnDelete();


            $table->foreignId('user_id')
            ->constrained('users')
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
        Schema::dropIfExists('user_colors');
    }
}
