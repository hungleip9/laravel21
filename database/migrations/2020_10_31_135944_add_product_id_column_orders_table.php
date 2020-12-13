<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductIdColumnOrdersTable extends Migration
{

    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('product_id')->after('user_id')
                ->nullable();

        });
    }


    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['orders']);
        });
    }
}
