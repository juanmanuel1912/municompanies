<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTerritorioVecisTable extends Migration
{
    public function up()
    {
        Schema::table('territorio_vecis', function (Blueprint $table) {
            $table->unsignedInteger('city_id');

            $table->foreign('city_id', 'city_fk_769677')->references('id')->on('cities');

            $table->unsignedInteger('team_id')->nullable();

            $table->foreign('team_id', 'team_fk_774375')->references('id')->on('teams');
        });
    }
}
