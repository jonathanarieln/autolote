<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //EL OBJETIVO DE ESTA TABLA ES GUARDAR LOS DATOS DE LOS AUTOS QUE SE INGRESARAN AL SISTEMA PRIMERO PASARAN POR ACA Y LUEGO
      //QUEDARAN GUARDADOS EN LA TABLA CARS Y ESTA TABLA SE BORRARAN LOS DATOS PARA ESTAR LISTA PARA UNA NUEVA ORDEN
      //ESTA TABLA SOLO SE LIMPIARA CON LIMPIAR ORDEN O CON GENERAR ORDEN
      //UN AGREGADO MUY TUANIS SERIA PODER MANEJAR VARIAS ORDENES ACTIVAS PERO QUIERE HUEVOS METERSE A ESE ROLLO
        Schema::create('temp_cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('plate');
            $table->string('engine');
            $table->string('chassis');
            $table->integer('year');
            $table->double('price');
            $table->bigInteger('color_id')->unsigned();
            $table->foreign('color_id')->references('id')->on('colors');
            $table->bigInteger('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->bigInteger('modelo_id')->unsigned();
            $table->foreign('modelo_id')->references('id')->on('modelos');
            $table->bigInteger('car_type_id')->unsigned();
            $table->foreign('car_type_id')->references('id')->on('car_types');
            //CUALQUIER LOCATION LIBRE AL CREAR EL VEHICULO SE PASARA LA LOCATION A OCUPADA
            $table->bigInteger('location_id')->unsigned();
            $table->foreign('location_id')->references('id')->on('locations');
            //EL USUARIO QUE ESTA UTILIZANDO LA TABLA PARA QUE DE VARIAS MAQUINAS PUEDAN ACCESAR A LA OPCION
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('temp_cars');
    }
}
