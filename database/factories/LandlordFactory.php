<?php

namespace Database\Factories;

use App\Models\Landlord;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LandlordFactory extends Factory
{
    protected $model = Landlord::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'company_name' => $this->faker->company,
            'phone_number' => $this->faker->phoneNumber,
        ];
    }
}
