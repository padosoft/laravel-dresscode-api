<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dresscode_raw_ordini', function (Blueprint $table) {
            $table->string('sourceName')->nullable();
            $table->string('priceListId')->nullable();
            $table->string('storeOrderId')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dresscode_raw_ordini', function (Blueprint $table) {
            $table->dropColumn('sourceName');
            $table->dropColumn('priceListId');
            $table->dropColumn('storeOrderId');
        });
    }

};
