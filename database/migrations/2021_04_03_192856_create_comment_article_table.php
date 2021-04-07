<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

class CreateCommentArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_article', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('article_id')->nullable();
            $table->string('message');
            $table->string('name');
            $table->string('status')->default('active');
            NestedSet::columns($table);

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
        Schema::dropIfExists('comment_article');
    }
}
