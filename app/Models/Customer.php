<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'address',
        'phoneNumber'
        
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public static function list()
    {
        $customers = Customer::orderByRaw('name')->get();
        $list = [];
        foreach ($customers as $customer) {
            $list[$customer->id] = $customer->name;
        }

        return $list;
    }
    
}
