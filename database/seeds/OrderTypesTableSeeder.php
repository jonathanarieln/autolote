<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('order_types')->insert([
          'order_type_name' => 'Ingreso',
          'available' => true,
          'positive'=>false,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
      DB::table('order_types')->insert([
          'order_type_name' => 'Venta',
          'available' => false,
          'positive'=> true,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
      DB::table('order_types')->insert([
          'order_type_name' => 'Arrendamiento',
          'available' => false,
          'positive'=> true,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      //DEVOLUCION DE ARRENDAMIENTO NORMAL SIN PAGOS EXTRAS
      DB::table('order_types')->insert([
          'order_type_name' => 'Devolucion Arrendamiento',
          'available' => true,
          'positive'=> false,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      //ACA SE PAGA EL VALOR INICIAL DEL MANTENIMIENTO
      DB::table('order_types')->insert([
          'order_type_name' => 'Mantenimiento',
          'available' => false,
          'positive'=> false,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      //SI NO HAY VALOR AGREGADO SE PONE EL VALOR EN CERO NO ES PROBLEMA PERO SI TOCA PAGAR EXTRAS PODEMOS DECIDIR CUALQUIERA DE LAS DOS SIGUIENTES
      DB::table('order_types')->insert([
          'order_type_name' => 'Devolucion Mantenimiento',
          'available' => false,
          'positive'=> false,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      //ESTA SE ENCARGA DE INABILITAR VEHICULOS POR UNA U OTRA RAZON COMO SER QUE ESTE DAÑADO
      //Y QUE NO FUNCIONE CORRECTAMENTE PERO AUN NO SE VALLA A MANTENIMIENTO POR LO TANTO EL ESTACIONAMIENTO ESTARA OCUPADO
      DB::table('order_types')->insert([
          'order_type_name' => 'Inabilitacion',
          'available' => false,
          'positive'=> false,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      //PUEDE REGRESAR UN CARRO DEL ESTADO INACTIVO POR RASONES DE INABILITACION
      DB::table('order_types')->insert([
          'order_type_name' => 'Habilitación',
          'available' => false,
          'positive'=> false,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      //SI NOS LLEGASEN A DAR MAS  DINERO ESTA LA HABILITAREMOS SOLO PARA LOS ADMINISTRADORES
      DB::table('order_types')->insert([
          'order_type_name' => 'Devolucion Mantenimiento Pagos Extras',
          'available' => false,
          'positive'=> false,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      //SI NOS LLEGASEN A REGRESAR DINERO ESTA LA HABILITAREMOS SOLO PARA LOS ADMINISTRADORES
      DB::table('order_types')->insert([
          'order_type_name' => 'Devolucion Mantenimiento con Devolucion de Dinero',
          'available' => false,
          'positive'=> true,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      //DEVOLUCION DE ARRENDAMIENTO ANTICIPADA SE PUEDE DEVOLVER CIERTA CANTIDAD
      DB::table('order_types')->insert([
          'order_type_name' => 'Devolucion Arrendamiento Anticipada',
          'available' => true,
          'positive'=> false,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      //DEVOLUCION DE ARRENDAMIENTO ATRASADA SE DEBE COBRAR CIERTA CANTIDAD
      DB::table('order_types')->insert([
          'order_type_name' => 'Devolucion Arrendamiento Atrasada',
          'available' => true,
          'positive'=> true,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }
}
