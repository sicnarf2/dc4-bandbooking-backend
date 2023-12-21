<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Vehicle;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'quantity',
        'total_amount',
    ];
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function vehicle()
{
    return $this->belongsTo(Vehicle::class);
}

    public static function list()
    {
        $orders = Order::orderByRaw('id')->get();
        $list = [];
        foreach ($orders as $order) {
            $list[$order->id] = $order->id;
        }

        return $list;
    }
}
