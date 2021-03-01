<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galery_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('galery_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->string('img')->nullable();
            $table->unique(['galery_id', 'locale']);
            $table->foreign('galery_id')->references('id')->on('galery')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galery_translations');
    }
}
