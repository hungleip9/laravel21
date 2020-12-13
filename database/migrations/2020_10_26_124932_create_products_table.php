<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->integer('origin_price')->nullable();
            $table->integer('sale_price')->nullable();
            $table->integer('discount_precent')->nullable();
            $table->string('content')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
