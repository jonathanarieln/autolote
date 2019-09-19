<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\TempCar;
use App\Color;
use App\Modelo;
use App\Brand;
use App\CarType;
use App\Location;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orders = Order::all();
      return view('orders.orders', compact('orders'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order_in()
    {
      $price = TempCar::sum('price');
      $cars = TempCar::where("user_id","=",Auth::user()->id)->get();
      return view('orders.order_in', compact(['cars','price']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order_in_new()
    {
      $price = TempCar::sum('price');
      $colors = Color::all();
      $brands = Brand::all();
      $models = Modelo::all();
      $car_types = CarType::all();
      $locations = Location::where("available","=",true)
                             ->get();
      return view('orders.order_in_new',compact(['price','colors','brands','models','car_types','locations']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order_in_store()
    {
      //hacemos el guardado del nuevo vehiculo
      $Datos = request()->validate([
          'plate' => 'required',
          'engine' => 'required',
          'chassis' => 'required',
          'year' => 'required',
          'price' => 'required',
          'color_id' => 'required',
          'brand_id' => 'required',
          'modelo_id' => 'required',
          'car_type_id' => 'required',
          'location_id' => 'required',
      ],[
           'plate.required' => 'Campo placa es obligatorio!',
           'engine.required' => 'Campo motor es obligatorio!',
           'chassis.required' => 'Campo chasis es obligatorio!',
           'year.required' => 'Campo año es obligatorio!',
           'price.required' => 'Campo precio es obligatorio!',
           'color_id.required' => 'Campo color es obligatorio!',
           'brand_id.required' => 'Campo marca es obligatorio!',
           'modelo_id.required' => 'Campo modelo es obligatorio!',
           'car_type_id.required' => 'Campo tipo vehículo es obligatorio!',
           'location_id.required' => 'Campo tipo ubicación es obligatorio!',
      ]);


      $carNew = TempCar::create([
           'plate'=> $Datos['plate'],
           'engine'=> $Datos['engine'],
           'chassis'=> $Datos['chassis'],
           'year'=> $Datos['year'],
           'price'=> $Datos['price'],
           'color_id'=> $Datos['color_id'],
           'brand_id'=> $Datos['brand_id'],
           'modelo_id'=> $Datos['modelo_id'],
           'car_type_id'=> $Datos['car_type_id'],
           'location_id'=> $Datos['location_id'],
           'user_id'=> Auth::user()->id,
         ]);


      $cars = TempCar::where("user_id","=",Auth::user()->id)->get();
      $price = TempCar::sum('price');
      return view('orders.order_in', compact(['cars','price']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order_clean()
    {

      //borramos los datos del usuario

      $cars = TempCar::where("user_id","=",Auth::user()->id)->get();

      foreach ($cars as $car) {
        $car->delete();
      }

      $cars = TempCar::where("user_id","=",Auth::user()->id)->get();
      return view('orders.order_in', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('/orders/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return("editando");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
