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
            $table->bigInteger('package_id')->unsigned();     
            $table->float('duration')->nullable()->comment('in min');
            $table->float('total')->default(0);
            $table->integer('default')->default(0);
            $table->float('extra_per_minute_fee')->default(0)->comment('in min');
            $table->boolean('status')->default(1);
            $table->integer('order_column')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('celebrity_id')
                  ->references('id')->on('celebrities')
                  ->onDelete('cascade');
            $table->foreign('package_id')
                  ->references('id')->on('packages')
                  ->onDelete('cascade');
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
