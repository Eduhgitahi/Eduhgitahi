<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factories corresponding model.
     * 
     *  @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the models default state
     * 
     *  return array
     */
    public function definition()
    {
        $status = $this->faker->randomElement(['B', 'P', 'V']);
        $name = $type == 'I' ? $this->fake->name() : $this->faker->company();
        
        return [
            'customer_id' =>Customer::factory(),
            'amount' => $this->faker->numberBetween(100, 20000),
            'status' => $status,
            'billed_date' => $this->faker->dateTimeThisDecade(),
            'paid_date' => $status == 'P' ? $this->faker->dateTimeThisDecade : NULL

        ];
    }
}