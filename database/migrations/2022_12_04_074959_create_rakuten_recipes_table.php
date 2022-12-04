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
        Schema::create('rakuten_recipes', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('food_image_url');
            $table->string('medium_image_url');
            $table->string('nickname');
            $table->boolean('pickup');
            $table->string('rank');
            $table->string('cost');
            $table->string('description');
            $table->string('indication');
            $table->jsonb('material');
            $table->dateTime('publishday');
            $table->string('title');
            $table->string('url');
            $table->boolean('shop');
            $table->string('small_image_url');
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
        Schema::dropIfExists('rakuten_recipes');
    }
};
