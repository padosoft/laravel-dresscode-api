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
        Schema::create('dresscode_raw_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('orderID')->unique();
            $table->timestamp('checkoutDate')->nullable();
            $table->integer('clientId');
            $table->string('storeId');
            $table->string('shippingType');
            $table->decimal('shippingCost', 8, 2);
            $table->decimal('voucher', 8, 2);
            $table->string('paymentMethod');
            $table->string('administrativeNotes')->nullable();
            $table->string('customerNotes')->nullable();
            $table->string('shippingVector');
            $table->string('packagingType');
            $table->decimal('packagingCost', 8, 2);
            $table->decimal('gstCost', 8, 2);
            $table->decimal('donation', 8, 2);
            $table->boolean('giftWrap')->default(false);
            $table->text('giftWrapNote')->nullable();
            $table->decimal('totalAmount', 8, 2);
            $table->boolean('is_error')->default(0);
            $table->string('note_error')->default('');
            $table->timestamps();
        });

        Schema::create('dresscode_raw_shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->unsigned();
            $table->string('businessName')->nullable();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('streetName');
            $table->string('streetNumber');
            $table->string('city');
            $table->string('zip');
            $table->string('state');
            $table->string('country');
            $table->string('phone');
            $table->string('mobile');
            $table->string('vatNumber')->nullable();
            $table->string('taxCode')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('dresscode_raw_billing_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('businessName')->nullable();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('streetName');
            $table->string('streetNumber');
            $table->string('city');
            $table->string('zip');
            $table->string('state');
            $table->string('country');
            $table->string('phone');
            $table->string('mobile');
            $table->string('vatNumber')->nullable();
            $table->string('taxCode')->nullable();
            $table->text('notes')->nullable();
            $table->string('officeCode')->nullable();
            $table->timestamps();
        });

        Schema::create('dresscode_raw_order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('productID');
            $table->string('sizeID');
            $table->integer('soldQuantity');
            $table->decimal('unitPrice', 8, 2);
            $table->decimal('vat', 8, 2);
            $table->decimal('discount', 8, 2);
            $table->timestamps();
        });
        Schema::create('dresscode_raw_order_discounts', function (Blueprint $table) {
            $table->id();
            $table->integer('order_detail_id')->unsigned();
            $table->foreign('order_detail_id')->references('id')->on('order_details')->onDelete('cascade');
            $table->string('discountType');
            $table->string('discountLabel')->nullable();
            $table->decimal('discountValue', 8, 2);
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
        Schema::dropIfExists('dresscode_raw_order_discounts');
        Schema::dropIfExists('dresscode_raw_order_details');
        Schema::dropIfExists('dresscode_raw_billing_addresses');
        Schema::dropIfExists('dresscode_raw_shipping_addresses');
        Schema::dropIfExists('dresscode_raw_orders');
    }
};
