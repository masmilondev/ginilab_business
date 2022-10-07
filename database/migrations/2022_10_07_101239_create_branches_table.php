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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('house')->nullable();
            $table->string('street')->nullable();
            $table->string('zone')->nullable();
            $table->string('city');
            $table->string('country');
            $table->string('mobile', 15);
            $table->string('email');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->double('vat')->default(0);
            $table->string('vat_registration_number')->nullable();
            $table->boolean('is_halal')->default(true);
            $table->boolean('cloud_sync')->default(true);
            $table->boolean('online_pre_order')->default(false);
            $table->dateTime('busy_until')->nullable();
            $table->foreignId('service_type_id')->constrained();
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
        Schema::dropIfExists('branches');
    }
};