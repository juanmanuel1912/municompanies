<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCategoriesTypesTable extends Migration
{
    public function up()
    {
        Schema::table('categories_types', function (Blueprint $table) {
            $table->unsignedInteger('rubro_id');

            $table->foreign('rubro_id', 'rubro_fk_769656')->references('id')->on('categories_items');

            $table->unsignedInteger('team_id')->nullable();

            $table->foreign('team_id', 'team_fk_774376')->references('id')->on('teams');
        });
    }
}
