<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;

class SaleController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $orders = Order::select('orders.user_id as user_id','users.user_name',DB::raw('SUM(orders.value) as value'))
                        ->join('users','orders.user_id','=','users.id')
                        ->groupBy('user_id','users.user_name')
                        ->where("order_type_id","=","3")
                        ->get();
    return view('sales.sales', compact('orders'));
  }
}
