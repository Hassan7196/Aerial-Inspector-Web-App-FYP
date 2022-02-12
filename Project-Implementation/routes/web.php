<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin',"\App\Http\Controllers\AdminController@index");
Route::get('/logOut',"\App\Http\Controllers\AdminController@logOut");
Route::get('/adminlogin',"\App\Http\Controllers\AdminController@login");
Route::get('/displayAdmin',"\App\Http\Controllers\AdminController@display");
Route::get('/alerts',function (){return view('Alerts.alerts');});
Route::get('/addAlerts',function (){return view('Alerts.addAlert');});
Route::get('/addCG',function (){return view('CultivationGuidelines.addCultivationGuidelines');});
Route::get('/addSI',function (){return view('SprayInformation.addSprayInformation');});
Route::get('/addDrone',function (){return view('Drone.addDrone');});
Route::get('/updateStatus/{id}/{name}',"\App\Http\Controllers\orderController@updateStatus");
Route::get('/calculatePercentage',"\App\Http\Controllers\orderController@alculateTasksPercentage");
Route::resource('/CGController',"\App\Http\Controllers\cultivationGuidelinesController");
Route::resource('/DroneController',\App\Http\Controllers\DroneController::class);
Route::resource('/altsControl',"\App\Http\Controllers\alertsController");
Route::resource('/SIController',"\App\Http\Controllers\sprayInformationController");
Route::resource('/orderController',\App\Http\Controllers\orderController::class);
Route::get('/hi',function (){


/*    $pendingOrders = DB::table('order_details')
        ->join('order_detail_order_status as od', 'od.order_detail_id', '=', 'order_details.id')
        ->join('order_statuses', 'od.order_status_id', '=', 'order_statuses.id')
        ->where('order_statuses.status', '=', 'pending')
        ->select(DB::raw('COUNT(*) as totalPendingRequests'))
        ->get();



    echo $pendingOrders->totalPendingRequests;*/

 /*   $totalOrders = DB::table('order_details')
        ->join('order_detail_order_status as od', 'od.order_detail_id', '=', 'order_details.id')
        ->join('order_statuses', 'od.order_status_id', '=', 'order_statuses.id')
        ->get([ 'order_details.price as price']);

    $pendingOrders = DB::table('order_details')
        ->join('order_detail_order_status as od', 'od.order_detail_id', '=', 'order_details.id')
        ->join('order_statuses', 'od.order_status_id', '=', 'order_statuses.id')
        ->where('order_statuses.status', '=', 'pending')
        ->get([ 'order_details.price as price']);


    $totalPrice = 0;
    foreach ($totalOrders as $totalOrder){
        $totalPrice += (int)$totalOrder->price;

    }

    $priceForPendingOrders = 0;
    foreach ($pendingOrders as $pendingOrder){
        $priceForPendingOrders += (int)$pendingOrder->price;
    }*/
   // echo ($priceForPendingOrders/$totalPrice)*100;

  /* $customers = DB::table('customers')
       ->join('orders','orders.id','=','customers.id')
       ->join('order_details','order_details.id','=','orders.id')
       ->join('order_detail_order_status as od','od.order_detail_id','=','order_details.id')
       ->join('order_statuses','od.order_status_id','=','order_statuses.id')
       ->where('order_statuses.status','=','accepted')
       ->get(['customers.*','order_statuses.id as OsId']);

   foreach ($customers as $customer){
       echo $customer->firstName;
       echo $customer->OsId;
     /*  echo $customer->lastName;
       echo $customer->email;
  }*/




   /* foreach ($orderStatuses as $orderStatus){
        foreach ($orderStatus->orderDetails as $orderDetail) {
            echo $orderDetail->price;
            echo "Hi";
        }
    }*/


/*    $orders = \App\Models\order::find(1);

    echo $orders->customer->firstName;
    echo "<br>";
   foreach ($orders->orderDetails as $orderDetail){
       foreach ($orderDetail->orderStatuses as $orderStatus){
           echo $orderStatus->Status;
       }
   }*/


  /* $orders = \App\Models\orderDetail::find(1);

    foreach ($orders->orderStatuses as $order){
        if ($order->Status == 'accepted') {
            echo $order->Status;
        }
    }*/

//   $orderDetails = \App\Models\orderDetail::find(1)->where('S');






     /*foreach ($orderDetails as $orderDetail){
       echo $
   }*/
});
