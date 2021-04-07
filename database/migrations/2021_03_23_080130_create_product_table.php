<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->default('active');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->integer('ordering')->nullable();

            $table->string('slug')->nullable();
            $table->bigInteger('category_id');
            $table->integer('price');
            $table->integer('price_sale')->default(0);
            $table->integer('sale')->nullable();
            $table->string('thumb');
            $table->string('product_code')->nullable();
            $table->string('quantity')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_meta')->nullable();
            $table->string('seo_description')->nullable();


            $table->string('created')->nullable();
            $table->string('created_by')->nullable();
            $table->string('modified')->nullable();
            $table->string('modified_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
