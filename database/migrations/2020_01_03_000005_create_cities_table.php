<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('distrito')->nullable();

            $table->string('departamento')->nullable();

            $table->string('provincia')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
