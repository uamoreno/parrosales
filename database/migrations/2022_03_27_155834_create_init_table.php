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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('phone',20,0)->unique();
            $table->string('email')->unique();
            $table->timestamps();
        });

        Schema::create('customeraddrs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned()->index();
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->integer('zip_code');
            $table->string('country');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('restrict')->onUpdate('restrict');

        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned()->index();
            $table->bigInteger('customeraddrs_id')->unsigned()->index();
            $table->string('payment_type');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('customeraddrs_id')->references('id')->on('customeraddrs')->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->decimal('price',10,2);
            $table->decimal('weight',10,2);
            $table->timestamps();
        });

        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->bigInteger('product_id')->unsigned()->index();
            $table->integer('quantity');
            $table->decimal('value',10,2);
            $table->decimal('subtotal',10,2);
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderdetails');
        Schema::dropIfExists('products');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('customeraddrs');
        Schema::dropIfExists('customers');

    }
};
