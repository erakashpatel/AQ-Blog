<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('posts', static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('title');
            $table->text('short_description');
            $table->text('long_description');
            $table->unsignedBigInteger('author')->index();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('posts', static function (Blueprint $table) {
            $table->foreign('author')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
}
