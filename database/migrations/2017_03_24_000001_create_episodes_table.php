
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     * @table episodes
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('show_id')->nullable()->default(NULL);
            $table->integer('number')->nullable()->default(NULL);
            $table->string('drive');
            $table->string('uploader')->default('ddolpali');
            $table->string('encoder')->default('NEXT');
            $table->integer('quality')->default('1080');
            $table->dateTime('date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('subbed')->default('0');
            $table->tinyInteger('marked')->default('0');
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

        Schema::drop('episodes');
    }
}
