<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalPublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_publications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('caution_month_id')->constrained();
            $table->foreignId('type_id')->constrained();
            $table->foreignId('salon_id')->constrained();
            $table->foreignId('service_id')->constrained();
            $table->foreignId('estate_id')->constrained();
            $table->string('title');
            $table->integer('area')->nullable();
            $table->string('quarter');
            $table->integer('price');
            $table->integer('phone');
            $table->integer('number_of_chamber');
            $table->integer('intern_toilet_number');
            $table->boolean('extern_toilet');
            $table->boolean('water');
            $table->boolean('electricitie');
            $table->boolean('plafond');
            $table->boolean('carreaux');
            $table->boolean('garage');
            $table->boolean('magasin');
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('rental_publications');
    }
}
