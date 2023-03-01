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
        Schema::table('dresscode_raw_shipping_addresses', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('dresscode_raw_orders');
        });

        Schema::table('dresscode_raw_billing_addresses', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('dresscode_raw_orders');
        });

        Schema::table('dresscode_raw_order_details', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('dresscode_raw_orders');
        });

        Schema::table('dresscode_raw_order_discounts', function (Blueprint $table) {
            $table->foreign('order_detail_id')->references('id')->on('dresscode_raw_order_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dresscode_raw_shipping_addresses', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });

        Schema::table('dresscode_raw_billing_addresses', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });

        Schema::table('dresscode_raw_order_details', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });

        Schema::table('dresscode_raw_order_discounts', function (Blueprint $table) {
            $table->dropForeign(['order_detail_id']);
        });
    }

};
