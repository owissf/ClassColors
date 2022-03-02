<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserroleClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userrole_clubs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('club_id')
            ->constrained('clubs')
            ->cascadeOnDelete();

            $table->foreignId('userrole_id')
            ->constrained('user_roles')
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
        Schema::dropIfExists('userrole_clubs');
    }
}
