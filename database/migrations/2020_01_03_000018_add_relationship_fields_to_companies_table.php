<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCompaniesTable extends Migration
{
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->unsignedInteger('ciudad_id');

            $table->foreign('ciudad_id', 'ciudad_fk_769815')->references('id')->on('cities');

            $table->unsignedInteger('territorio_veci_id');

            $table->foreign('territorio_veci_id', 'territorio_veci_fk_769816')->references('id')->on('territorio_vecis');

            $table->unsignedInteger('categories_items_id');

            $table->foreign('categories_items_id', 'categories_items_fk_769819')->references('id')->on('categories_items');

            $table->unsignedInteger('categories_types_id');

            $table->foreign('categories_types_id', 'categories_types_fk_769839')->references('id')->on('categories_types');

            $table->unsignedInteger('team_id')->nullable();

            $table->foreign('team_id', 'team_fk_774372')->references('id')->on('teams');
        });
    }
}
