<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEptitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eptitles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('did');
            $table->integer('ep');
            $table->string('name')->nullable()->default(NULL);
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
        Schema::drop('eptitles');
    }
}
