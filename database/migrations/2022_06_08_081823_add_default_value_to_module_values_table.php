<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultValueToModuleValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_values', function (Blueprint $table) {
            $table->longText('default_value')->nullable();
            $table->integer('theme_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_values', function (Blueprint $table) {
            $table->dropColumn('default_value');
            $table->dropColumn('theme_id');
        });
    }
}
