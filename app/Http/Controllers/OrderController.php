<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\TempCar;
use App\ToHireTempCar;
use App\Color;
use App\Modelo;
use App\Brand;
use App\CarType;
use App\Location;
use App\Car;
use App\Movement;
use App\Client;
use Auth;
use Redirect;
use Carbon\Carbon;

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


    public function api()
    {
      $orders = Order::all();
      return response()->json([
          'success' => true,
          'data' => $orders
      ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function to_hire_order()
    {
      $clients = Client::all();
      $to_hire_temp_cars = ToHireTempCar::where("user_id","=",Auth::user()->id)->get();
      return view('orders.to_hire_order', compact(['clients','to_hire_temp_cars']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function to_hire_order_new()
    {
      $cars = Car::where('available','=',true)->get();
      return view('orders.to_hire_order_new',compact(['cars']));
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function to_hire_order_store()
    {
      //hacemos el guardado del nuevo vehiculo
      $Datos = request()->validate([
          'car_id' => 'required|unique:to_hire_temp_cars,car_id',
      ],[
           'car_id.required' => 'Campo Automovil es obligatorio!',
           'car_id.unique' => 'El Automovil ya esta en la orden!',
      ]);

      $carNew = ToHireTempCar::create([
           'car_id'=> $Datos['car_id'],
           'user_id'=> Auth::user()->id,
         ]);

      $clients = Client::all();
      $to_hire_temp_cars = ToHireTempCar::where("user_id","=",Auth::user()->id)->get();
      return view('orders.to_hire_order', compact(['clients','to_hire_temp_cars']));
    }

    public function to_hire_order_clean()
    {

      //borramos los datos del usuario

      $cars = ToHireTempCar::where("user_id","=",Auth::user()->id)->get();

      foreach ($cars as $car) {
        $car->delete();
      }

      $clients = Client::all();
      $to_hire_temp_cars = ToHireTempCar::where("user_id","=",Auth::user()->id)->get();
      return view('orders.to_hire_order', compact(['clients','to_hire_temp_cars']));
    }


    public function to_hire_order_type_store()
    {
      if(ToHireTempCar::count()==0){
            return Redirect::back()->withErrors(['No ha ingresado ningun vehiculo']);
      }else {
        $Datos = request()->validate([
          'client_id' => 'required',
          'days' => 'required',
        ],[
          'client_id.required' => 'Campo Cliente es obligatorio!',
          'days.required' => 'Campo Dias es obligatorio!',
        ]);

        //Guardamos todos los datos de las ORDENES aca comienza el guardado
        //obtenemos los datos en base de datos encargados del ingreso de autos
        $cars = ToHireTempCar::where("user_id","=",Auth::user()->id)->get();
        //inicializamos el precio en cero
        $price = 0.00;
        foreach ($cars as $car) {
          $price += $car->car->car_type->base_price;
        }

        $orderNew = Order::create([
             'client_id'=> $Datos["client_id"],
             'order_type_id'=> 3,
             'user_id'=> Auth::user()->id,
             'days'=> $Datos["days"],
             'comments'=> "Orden de arrendamiento exitosa",
             'value'=> $price*$Datos["days"],
           ]);

        //Por cada uno de los vehiculos en base guardamos en la tablla cars
        foreach ($cars as $car) {
          $price += $car->car->car_type->base_price;
          $location = Location::find($car->car->location_id);
          $location->available = true;
          $location->update();
          $carLoc = Car::find($car->car->id);
          $carLoc->available = false;
          $carLoc->location_id = null;
          $carLoc->update();
             $movementNew = Movement::create([
                  'movement_name'=> "Arrendamiento",
                  'available'=> 0,
                  'car_id'=> $car->car->id,
                ]);

                DB::table('car_order')->insert([
                    'car_id' => $car->car->id,
                    'order_id' => $orderNew->id,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);



          $car->delete();
        }

        return redirect()->route('orders.index');

        //termina el guardado de la orden
      }
    }

    //ORDEN DE RETORNO DE ARRENDAMIENTO
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function return_to_hire_order()
    {
          $orders = Order::where("order_type_id","=","3")->where("order_id","=",null)->get();
          return view('orders.return_to_hire_order',compact(['orders']));
    }

    //ORDEN que guarda el retorno de mantenimiento
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function return_to_hire_order_store()
    {
          $Datos = request()->validate([
            'order_id' => 'required',
          ],[
            'order_id.required' => 'Campo Orden es obligatorio!',
          ]);

          $orderOld = Order::find($Datos["order_id"]);

          $orderNew = Order::create([
            'client_id'=> $orderOld->client_id,
            'order_type_id'=> 4,
            'user_id'=> Auth::user()->id,
            'days'=> $orderOld->days,
            'comments'=> "Orden de arrendamiento regresada exitosa",
            'value'=> 0,
            ]);



            $orderOld->order_id = $orderNew->id;

            $orderOld->update();




          foreach ($orderOld->cars as $car) {

            DB::table('car_order')->insert([
                'car_id' => $car->id,
                'order_id' => $orderNew->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            $movementNew = Movement::create([
                 'movement_name'=> "Devolucion Arrendamiento",
                 'available'=> true,
                 'car_id'=> $car->id,
               ]);
            $car->available = true;
            $freeLocation = Location::where("available","=",true)->first();
            $car->location_id = $freeLocation->id;
            $car->update();
            $freeLocation->available = false;
            $freeLocation->update();

          }



          return redirect()->route('orders.index');
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
      $clients = Client::all();
      return view('orders.order_in', compact(['cars','price','clients']));
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
      $clients = Client::all();
      return view('orders.order_in_new',compact(['price','colors','brands','models','car_types','locations','clients']));
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
           'price'=> str_replace(",","",$Datos['price']),
           'color_id'=> $Datos['color_id'],
           'brand_id'=> $Datos['brand_id'],
           'modelo_id'=> $Datos['modelo_id'],
           'car_type_id'=> $Datos['car_type_id'],
           'location_id'=> $Datos['location_id'],
           'user_id'=> Auth::user()->id,
         ]);


      $cars = TempCar::where("user_id","=",Auth::user()->id)->get();
      $price = TempCar::sum('price');
      $clients = Client::all();
      return view('orders.order_in', compact(['cars','price','clients']));
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
      $price = TempCar::sum('price');
      return view('orders.order_in', compact(['cars','price']));
    }

    public function order_type_in_store()
    {

      if(TempCar::count()==0){

            return Redirect::back()->withErrors(['No ha ingresado ningun vehiculo']);

      }else{

        //Hacemos el validate al campo cliente por si alguien quiere pasar algo raro por html
        $Dato = request()->validate([
            'client_id' => 'required',
        ],[
             'client_id.required' => 'Campo Cliente es obligatorio!',
        ]);

      //obtenemos los datos en base de datos encargados del ingreso de autos
      $cars = TempCar::where("user_id","=",Auth::user()->id)->get();
      $price = TempCar::sum('price');

      $orderNew = Order::create([
           'client_id'=> $Dato["client_id"],
           'order_type_id'=> 1,
           'user_id'=> Auth::user()->id,
           'comments'=> "Orden Exitosa",
           'value'=> $price,
         ]);

      //Por cada uno de los vehiculos en base guardamos en la tablla cars
      foreach ($cars as $car) {
        $location = Location::find($car->location_id);
        $location->available = false;
        $location->update();
        $carNew = Car::create([
             'plate'=> $car->plate,
             'engine'=> $car->engine,
             'chassis'=> $car->chassis,
             'year'=> $car->year,
             'available' => true,
             'price'=> $car->price,
             'color_id'=> $car->color_id,
             'brand_id'=> $car->brand_id,
             'modelo_id'=> $car->modelo_id,
             'car_type_id'=> $car->car_type_id,
             'location_id'=> $car->location_id,
           ]);
           $movementNew = Movement::create([
                'movement_name'=> "Ingreso",
                'available'=> 1,
                'car_id'=> $carNew->id,
              ]);

              DB::table('car_order')->insert([
                  'car_id' => $carNew->id,
                  'order_id' => $orderNew->id,
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                  'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
              ]);



        $car->delete();
      }
      return redirect()->route('orders.index');
      }


    }

    //ORDEN DE VENTA
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sale_order()
    {
          $cars = Car::where("available","=",true)->get();
          $clients = Client::all();
          return view('orders.sale_order', compact(['cars','clients']));
    }

    //ORDEN DE VENTA
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sale_order_type_store()
    {


      $Dato = request()->validate([
          'client_id' => 'required',
          'car_id' => 'required',
          'value' => 'required',
      ],[
           'client_id.required' => 'Campo Cliente es obligatorio!',
           'car_id.required' => 'Campo Vehículo es obligatorio!',
           'value.required' => 'Campo Precio es obligatorio!',
      ]);


          return "Guardando";
    }


    //ORDEN DE Mantenimiento
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function maintenance_order()
    {
          return "Orden de mantenimiento";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function return_maintenance_order()
    {
          return 'Retorno de orden de mantenimiento';
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
        $order = Order::find($id);
        return view('orders.show', ['order' => $order]);
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
        return("eliminando");
    }
}
