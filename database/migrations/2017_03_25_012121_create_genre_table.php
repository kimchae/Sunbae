<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenreTable extends Migration
{
    /**
     * Run the migrations.
     * @table genre
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('did');
            $table->string('name');
            # Indexes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
        Schema::drop('genre');
    }
}
