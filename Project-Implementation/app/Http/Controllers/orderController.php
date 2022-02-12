<?php

namespace App\Http\Controllers;

use App\Models\orderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Order.acceptedOrders');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if($id == 1){
            return view('Order.PendingOrders');

        }
        if($id == 2){
            return view('Order.deliveredOrders');

        }
        else{
            return view('Order.acceptedOrders');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //
       /* $status = orderStatus::find($id);

        $SI->cropName = $request->crop;
        $SI->diseaseName = $request->disease;
        $SI->sprayDescription = $request->disease;

        $SI->save();

        return view('SprayInformation.sprayInformation');*/
    }
    public function updateStatus($id,$status){


        $orderStatus = orderStatus::find($id);
        if($status == 'pending') {
            $orderStatus->Status = $status;

            $orderStatus->save();
            return view('Order.PendingOrders');
        }
        if ($status == 'delivered'){
            $orderStatus->Status = $status;

            $orderStatus->save();
            return view('Order.deliveredOrders');
        }
        if ($status == 'accepted'){
            $orderStatus->Status = $status;

            $orderStatus->save();
            return view('Order.acceptedOrders');
        }



    }

    public function calculateTasksPercentage(){
        $totalOrders = DB::table('order_details')
            ->join('order_detail_order_status as od', 'od.order_detail_id', '=', 'order_details.id')
            ->join('order_statuses', 'od.order_status_id', '=', 'order_statuses.id')
            ->get([ 'order_details.price as price']);

        $pendingOrders = DB::table('order_details')
            ->join('order_detail_order_status as od', 'od.order_detail_id', '=', 'order_details.id')
            ->join('order_statuses', 'od.order_status_id', '=', 'order_statuses.id')
            ->where('order_statuses.status', '=', 'accepted')
            ->orWhere('order_statuses.status', '=', 'delivered')
            ->get([ 'order_details.price as price']);


        $totalPrice = 0;
        foreach ($totalOrders as $totalOrder){
            $totalPrice += (int)$totalOrder->price;

        }

        $priceForPendingOrders = 0;
        foreach ($pendingOrders as $pendingOrder){
            $priceForPendingOrders += (int)$pendingOrder->price;
        }

        return round((($priceForPendingOrders/$totalPrice)*100),2);
    }

    public function pendingRequests(){

        $pendingOrders = DB::table('order_details')
            ->join('order_detail_order_status as od', 'od.order_detail_id', '=', 'order_details.id')
            ->join('order_statuses', 'od.order_status_id', '=', 'order_statuses.id')
            ->where('order_statuses.status', '=', 'pending')
            ->select(DB::raw('COUNT(*) as totalPendingRequests'))
            ->first();


        //$pendingOrders->next();

       return $pendingOrders->totalPendingRequests;
      //  return (int)$pendingOrders->totalPendingRequests;
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

    }
}
