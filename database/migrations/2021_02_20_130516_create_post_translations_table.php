<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->string('locale')->index();
            $table->string('author')->nullable();
            $table->string('title');
            $table->text('desc')->nullable();
            $table->text('text');
            $table->string('img')->nullable();
            $table->string('file')->nullable();
            $table->unique(['post_id', 'locale']);
            $table->foreign('post_id')->references('id')->on('post')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_translations');
    }
}
