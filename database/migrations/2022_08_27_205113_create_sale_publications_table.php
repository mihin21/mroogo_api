<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_publications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('service_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('estate_id')->constrained();
            $table->string('title');
            $table->integer('area');
            $table->integer('phone');
            $table->string('quarter');
            $table->integer('price');
            $table->text('description');
            $table->string('picture1');
            $table->string('picture2')->nullable();
            $table->string('picture3')->nullable();
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
        Schema::dropIfExists('sale_publications');
    }
}
