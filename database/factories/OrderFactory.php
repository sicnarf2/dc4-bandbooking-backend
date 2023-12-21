<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use App\Models\Vehicle;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        //     Schema::create('orders', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('customer_id')->constrained()->onDelete('cascade');
        //     $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
        //     $table->integer('quantity');
        //     $table->float('total_amount');
        //     $table->timestamps();
        // });
            'customer_id' => fake()->randomElement(Customer::pluck('id')),
            'vehicle_id' => fake()->randomElement(Vehicle::pluck('id')),
            'quantity' => fake()->randomNumber(1),
            'total_amount' => fake()->numberBetween(1000.00, 100000.00),
        ];
    }
}
