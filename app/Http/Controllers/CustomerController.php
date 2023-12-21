<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customer = Customer::orderBy('id')->get();
        return response()->json($customer);
    }

    public function view(Customer $customer)
    {   
        $customer->load('order');
        return response()->json($customer);
    }

    public function store(Request $request, Customer $customer)
    {
        $fields = $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phoneNumber' => 'required',
        ]);

        $customer = Customer::create($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'New customer created with the ID#' .$customer->id
        ]);
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'fullname' => 'string',
            'email' => 'string',
            'address' => 'string',
            'phoneNumber' => 'string',
            
        ]);

        
        $customer->update($validatedData);

        return response()->json([
            'status' => 'OK',
            'message' => 'Customer with ID#' . $customer->id . ' has been updated.'
        ]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json([
            'status' => "OK",
            'messge' => 'Customer with the customer id of ' .$customer->id . ' has been deleted'
        ]);
    }

    
}
