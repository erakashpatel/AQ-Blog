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
        Schema::create('user_roles', static function (Blueprint $table) {
            $table->unsignedBigInteger('user')->index();
            $table->foreign('user')->references('id')->on('users');

            $table->unsignedBigInteger('role')->index();
            $table->foreign('role')->references('id')->on('roles');

            $table->engine = 'InnoDB';
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
