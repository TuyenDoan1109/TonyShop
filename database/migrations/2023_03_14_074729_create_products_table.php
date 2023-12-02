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
            $table->integer('price');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('admin_id');
            $table->text('content')->nullable();
            $table->string('feature_image_name')->nullable();
            $table->string('feature_image_path')->nullable();
            $table->integer('status')->default(1);
            $table->softDeletes();    // add soft delete
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
