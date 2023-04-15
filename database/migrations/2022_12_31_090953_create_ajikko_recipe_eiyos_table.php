<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajikko_recipe_eiyos', function (Blueprint $table) {
            $table->unsignedBigInteger('ajikko_recipe_id');
            $table->unsignedBigInteger('eiyo_id');
            $table->unsignedSmallInteger('volume');

            $table->id();
            $table->foreign('ajikko_recipe_id')
                ->references('id')
                ->on('ajikko_recipes');
            $table->foreign('eiyo_id')
                ->references('id')
                ->on('eiyos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ajikko_recipe_eiyos');
    }
};
