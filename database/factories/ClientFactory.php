<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition()
    {
        return [
			'email' => $this->faker->unique()->safeEmail(),
			'fullname' => $this->faker->name,
			'ci' => Str::random(10),
			'occupation' => 'na',
			'address' => 'EEUU',
			'citycode' => "MIAMI - ".Str::random(5),
			'phone' => Str::random(15),
			'dob' => now(),
			'knowabout' => 1,
			'created_at' => now()
        ];
    }
}
