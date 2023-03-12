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
        Schema::create('dresscode_raw_ordini', function (Blueprint $table) {
            $table->id();
            $table->integer('orderID');
            $table->dateTime('checkoutDate');
            $table->integer('clientId');
            $table->string('storeId');
            $table->string('shippingType');
            $table->decimal('shippingCost', 8, 2);
            $table->decimal('voucher', 8, 2);
            $table->string('paymentMethod');
            $table->string('administrativeNotes');
            $table->string('customerNotes');
            $table->string('shippingVector');
            $table->string('packagingType');
            $table->decimal('packagingCost', 8, 2);
            $table->decimal('gstCost', 8, 2);
            $table->decimal('donation', 8, 2);
            $table->boolean('giftWrap');
            $table->string('giftWrapNote');
            $table->decimal('totalAmount', 8, 2);
            $table->json('shippingAddress')->nullable()->default(null);
            $table->json('billingAddress')->nullable()->default(null);
            $table->boolean('is_error')->default(false);
            $table->string('data_error')->nullable()->default(null);
            $table->timestamps();
        });
        Schema::create('dresscode_raw_dettagli_ordine', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ordine')->unsigned();
            $table->string('productID');
            $table->string('sizeID');
            $table->integer('soldQuantity');
            $table->decimal('unitPrice', 8, 2);
            $table->decimal('vat', 8, 2);
            $table->decimal('discount', 8, 2);
            $table->json('discountDetails')->nullable()->default(null);
            $table->timestamps();
        });
        Schema::create('dresscode_raw_indirizzo_spedizione', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ordine')->unsigned();
            $table->string('businessName');
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
            $table->string('vatNumber');
            $table->string('taxCode');
            $table->string('notes');
            $table->timestamps();
        });
        Schema::create('dresscode_raw_indirizzo_fatturazione', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ordine')->unsigned();
            $table->string('businessName');
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
            $table->string('vatNumber');
            $table->string('taxCode');
            $table->string('notes');
            $table->string('officeCode');
            $table->timestamps();
        });
        Schema::create('dresscode_raw_dettagli_sconto', function (Blueprint $table) {
            $table->id();
            $table->integer('id_dettaglio_ordine')->unsigned();
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
        Schema::dropIfExists('dresscode_raw_ordini');
        Schema::dropIfExists('dresscode_raw_dettagli_ordine');
        Schema::dropIfExists('dresscode_raw_indirizzo_spedizione');
        Schema::dropIfExists('dresscode_raw_indirizzo_fatturazione');
        Schema::dropIfExists('dresscode_raw_dettagli_sconto');
    }

};
