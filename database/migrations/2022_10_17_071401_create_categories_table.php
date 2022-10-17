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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade');
            $table->string('name');
            $table->foreignId('parent_id')->nullable()->constrained('categories');
            $table->string('color')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('categories');
    }
};
