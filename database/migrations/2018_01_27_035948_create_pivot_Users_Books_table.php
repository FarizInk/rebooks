<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotUsersBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('book_user', function (Blueprint $table){
        //   $table->integer('book_id')->unsigned();
        //   $table->integer('user_id')->unsigned();

        //   $table->engine = 'InnoDB';
        //   $table->foreign('book_id')->references('id')->on('books');
        //   $table->foreign('user_id')->references('id')->on('users');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('users_books');
    }
}
