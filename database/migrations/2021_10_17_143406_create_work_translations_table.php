<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['work_id','locale']);
            $table->foreign('work_id')->references('id')->on('works')->delete('cascade');
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
        Schema::dropIfExists('work_translations');
    }
}
