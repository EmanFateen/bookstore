<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('book_id');
            $table->text('title');
            $table->float('avarage_rating');
            $table->string('language_code');
            $table->bigInteger('num_pages');
            $table->bigInteger('rating_count');
            $table->bigInteger('text_reviews_count');
            $table->timestamp('published_at');

            $table->unsignedBigInteger('publisher_id');

            $table->foreign('publisher_id')->references('id')->on('publishers');
            

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
