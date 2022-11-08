<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('general_id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('locale')->index();
            $table->unique(['general_id','locale']);
            $table->foreign('general_id')->references('id')->on('generals')->delete('cascade');
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
        Schema::dropIfExists('general_translations');
    }
}
