<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCelebrityPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celebrity_packages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('celebrity_id')->unsigned();
            $table->string('video_type');
            $table->integer('per_minute_fee')->default(0);
            $table->integer('extra_per_minute_fee')->default(0);
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
        Schema::dropIfExists('celebrity_packages');
    }
}
