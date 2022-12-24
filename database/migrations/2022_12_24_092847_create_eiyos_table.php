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
        Schema::create('eiyos', function (Blueprint $table) {
            $table->id();
            $table->string('food_name');
            $table->integer('enerc_kcal');
            $table->string('prot');
            $table->string('chole');
            $table->string('fat');
            $table->string('choavlm');
            $table->string('fib');
            $table->string('oa');
            $table->string('ash');
            $table->string('na');
            $table->string('k');
            $table->string('ca');
            $table->string('mg');
            $table->string('p');
            $table->string('fe');
            $table->string('zn');
            $table->string('cu');
            $table->string('mn');
            $table->string('se');
            $table->string('cr');
            $table->string('mo');
            $table->string('retol');
            $table->string('carta');
            $table->string('cartb');
            $table->string('crypxb');
            $table->string('cartbeq');
            $table->string('vita_rae');
            $table->string('vitd');
            $table->string('tocpha');
            $table->string('tocphb');
            $table->string('tocphg');
            $table->string('tocphd');
            $table->string('vitk');
            $table->string('thia');
            $table->string('ribf');
            $table->string('nia');
            $table->string('ne');
            $table->string('vitb6a');
            $table->string('vitb12');
            $table->string('fol');
            $table->string('pantac');
            $table->string('biot');
            $table->string('vitc');
            $table->string('alc');
            $table->string('nacl_eq');
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
        Schema::dropIfExists('eiyos');
    }
};
