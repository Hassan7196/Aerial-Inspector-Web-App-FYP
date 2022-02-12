<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class orderDetail extends Model
{

    public $timestamps = false;
    use HasFactory;

    public function orderStatuses(){
        return $this->belongsToMany(orderStatus::class);
    }
    public function aunnualEarning(){

        $earnings = DB::table('order_details')
            ->join('order_detail_order_status as od', 'od.order_detail_id', '=', 'order_details.id')
            ->join('order_statuses', 'od.order_status_id', '=', 'order_statuses.id')
            ->where('order_statuses.status', '=', 'accepted')
            ->orWhere('order_statuses.status', '=', 'delivered')
            ->get([ 'order_details.price as price']);


        $sum = 0;
        foreach ($earnings as $earning){


            $sum = $sum + (int)$earning->price;

        }
        return $sum;
    }

    public function taskPercentage(){
        $totalOrders = DB::table('order_details')
            ->join('order_detail_order_status as od', 'od.order_detail_id', '=', 'order_details.id')
            ->join('order_statuses', 'od.order_status_id', '=', 'order_statuses.id')
            ->where('order_statuses.status', '=', 'accepted')
            ->orWhere('order_statuses.status', '=', 'delivered')
            ->get([ 'order_details.price as price']);

    }
}
