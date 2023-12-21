<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\JsonResponse;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(): JsonResponse
    {
        $orders = Order::with('customer', 'vehicle')->get();
        return response()->json($orders);
    }


    public function view(Order $order){
        $order->load('customer', 'vehicle');
        return response()->json($order);
    }

    public function update(Request $request, Order $order) {
        $fields = $request->validate([
            'customer_id' => 'numeric',
            'vehicle_id' => 'numeric',
            'quantity' => 'numeric',
            'total_amount' => 'numeric',
        ]);
    
        $order->update($fields);
    
        return response()->json([
            'status' => 'OK',
            'message' => 'Order with an ID# ' . $order->id . ' has been updated.'
        ]);
    }
    
    public function store(Request $request) {
        $fields = $request->validate([
            'customer_id' => 'numeric',
            'vehicle_id' => 'numeric',
            'quantity' => 'numeric',
            'total_amount' => 'numeric',
        ]);
    
        $order = Order::create($fields);
    
        return response()->json([
            'status' => 'OK',
            'message' => 'New order created with ID# ' . $order->id . '.'
        ]);
    }
    

    public function destroy(Order $order){
        $order->delete();

        return response()->json([
            'status' => "OK",
            'message' => 'With the order# ' .$order->id . ' has been deleted'
        ]);
    }



}
