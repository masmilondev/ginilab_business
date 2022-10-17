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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('unit_id')->constrained('units');
            $table->foreignId('brand_id')->nullable()->constrained('brands');
            $table->double('sell_price');
            $table->double('cost_price');
            $table->double('vat')->default(0);
            $table->double('minimum_sale_quantity')->default(1);
            $table->double('stock');
            $table->text('description')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('variant')->nullable();
            $table->string('images')->nullable();
            $table->string('sku')->nullable();
            $table->string('barcode')->nullable();
            $table->double('discount')->nullable();
            $table->boolean('isActive')->default(true);
            $table->foreignId('service_type_id');
            $table->boolean('exclude_from_discount')->default(false);
            $table->tinyInteger('show_on')->default(3); // [1 - 'online', 2- 'offline', 3- 'all']
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
        Schema::dropIfExists('products');
    }
};
