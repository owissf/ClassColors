<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_clubs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('club_id')
            ->constrained('clubs')
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
        Schema::dropIfExists('user_clubs');
    }
}
