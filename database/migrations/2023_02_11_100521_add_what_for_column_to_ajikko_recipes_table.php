<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
  {
    Schema::table('ajikko_recipes', function (Blueprint $table) {
        $table->decimal('how_many', 5, 1)->after('description');
    });
  }
public function down()
  {
    Schema::table('ajikko_recipes', function (Blueprint $table) {
        $table->dropColumn('how_many');
    });
  }
};
