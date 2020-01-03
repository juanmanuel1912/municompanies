<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCentrosEducativosTable extends Migration
{
    public function up()
    {
        Schema::table('centros_educativos', function (Blueprint $table) {
            $table->unsignedInteger('ciudad_id');

            $table->foreign('ciudad_id', 'ciudad_fk_819701')->references('id')->on('cities');

            $table->unsignedInteger('territorio_veci_id');

            $table->foreign('territorio_veci_id', 'territorio_veci_fk_819702')->references('id')->on('territorio_vecis');

            $table->unsignedInteger('categories_items_id');

            $table->foreign('categories_items_id', 'categories_items_fk_819705')->references('id')->on('categories_items');

            $table->unsignedInteger('categories_types_id');

            $table->foreign('categories_types_id', 'categories_types_fk_819706')->references('id')->on('categories_types');

            $table->unsignedInteger('team_id')->nullable();

            $table->foreign('team_id', 'team_fk_819722')->references('id')->on('teams');

            $table->unsignedInteger('departamento_id')->nullable();

            $table->foreign('departamento_id', 'departamento_fk_820248')->references('id')->on('cities');

            $table->unsignedInteger('provincia_id')->nullable();

            $table->foreign('provincia_id', 'provincia_fk_820249')->references('id')->on('cities');

            $table->unsignedInteger('distrito_id')->nullable();

            $table->foreign('distrito_id', 'distrito_fk_820250')->references('id')->on('cities');
        });
    }
}
