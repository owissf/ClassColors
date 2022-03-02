<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
            ->constrained('users')
            ->cascadeOnDelete();

            $table->foreignId('role_id')
            ->constrained('roles')
            ->cascadeOnDelete();

            // $table->unsignedBigInteger('club_id')->nullable();
            // $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');

            // $table->unsignedBigInteger('color_id')->nullable();
            // $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

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
        Schema::dropIfExists('user_roles');
    }
}
