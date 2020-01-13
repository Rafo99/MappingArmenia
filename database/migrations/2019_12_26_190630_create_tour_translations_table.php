<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tour_id')->index();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description');

            $table->unique(['tour_id', 'locale']);
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_translations');
    }
}
