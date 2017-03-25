
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDramaTable extends Migration
{
    /**
     * Run the migrations.
     * @table drama
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->default('1');
            $table->string('name');
            $table->string('altname')->nullable()->default(NULL);
            $table->text('synopsis')->nullable()->default(NULL);
            $table->string('network')->nullable()->default(NULL);
            $table->integer('tvdb')->nullable()->default(NULL);
            $table->string('imdb')->nullable()->default(NULL);
            $table->tinyInteger('featured')->default('0');
            $table->bigInteger('tag')->nullable()->default(NULL);
            $table->dateTime('airdate')->nullable();
            $table->dateTime('enddate')->nullable();
            $table->string('airday')->nullable()->default(NULL);
            $table->tinyInteger('ongoing')->default('0');
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

        Schema::drop('drama');
    }
}
