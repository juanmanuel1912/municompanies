<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');

            $table->string('codcompany')->unique();

            $table->string('turno')->nullable();

            $table->date('date_index')->nullable();

            $table->string('category_empresa')->nullable();

            $table->string('name_company');

            $table->string('address');

            $table->longText('reference')->nullable();

            $table->integer('num_float')->nullable();

            $table->float('float_company', 15, 1)->nullable();

            $table->string('caracteristicas')->nullable();

            $table->string('uso_local')->nullable();

            $table->string('material')->nullable();

            $table->string('tipoempresa')->nullable();

            $table->float('latitude', 15, 8)->nullable();

            $table->float('longitude', 15, 8)->nullable();

            $table->longText('description')->nullable();

            $table->string('link_google_map')->nullable();

            $table->string('website')->nullable();

            $table->string('email')->nullable();

            $table->string('telefono')->nullable();

            $table->string('telefono_2')->nullable();

            $table->string('encargado')->nullable();

            $table->boolean('active')->default(0)->nullable();

            $table->string('cod_zip')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
