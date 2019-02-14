<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('book_id')->nullable();
            $table->string('book_name')->nullable();
            $table->string('author_name')->nullable();
            $table->datetime('published_at')->nullable();
            $table->integer('owner_id')->nullable()->comment('user_id');;
            $table->integer('caegory_id')->nullable();
            $table->string('image')->nullable();
            $table->integer('is_available')->default(1);
            $table->integer('available_id')->nullable();
            $table->integer('hub_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('books');
    }
}