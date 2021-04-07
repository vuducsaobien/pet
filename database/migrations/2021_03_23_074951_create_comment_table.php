<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->bigInteger('customer_id')->nullable();
            $table->integer('star')->default(5);
            $table->string('message');
            $table->string('ip');
            $table->string('name');
            $table->string('email');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('comment');
    }
}
