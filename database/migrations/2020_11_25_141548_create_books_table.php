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
            $table->bigInteger('celebrity_package_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->string('from')->nullable();
            $table->string('subject');
            $table->string('message')->nullable();
            $table->datetime('upload_time');
            $table->integer('status')->default('0');
            $table->integer('publish')->default('0');
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
