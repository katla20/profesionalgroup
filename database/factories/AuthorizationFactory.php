<?php

namespace Database\Factories;

use App\Models\Authorization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AuthorizationFactory extends Factory
{
    protected $model = Authorization::class;

    public function definition()
    {
        return [
			'client_id' => $this->faker->name,
			'user_id' => $this->faker->name,
			'proceeded' => $this->faker->name,
			'proceeded_date' => $this->faker->name,
			'signature_client' => $this->faker->name,
			'signature_date' => $this->faker->name,
			'skin_type' => $this->faker->name,
			'history' => $this->faker->name,
			'history_specify' => $this->faker->name,
			'colors' => $this->faker->name,
			'reason' => $this->faker->name,
			'color_observation' => $this->faker->name,
        ];
    }
}
