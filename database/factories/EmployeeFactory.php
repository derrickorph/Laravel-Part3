<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'email'=>$this->faker->email,
            'phone'=>$this->faker->phoneNumber,
            'salary'=>$this->faker->numberBetween(30000,50000),
            'department'=>$this->faker->randomElement(array('Informatique','Marketing','Comptabilité','Ingénieur')),
        ];
    }
}
