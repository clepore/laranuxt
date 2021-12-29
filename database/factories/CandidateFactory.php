<?php

namespace Database\Factories;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Candidate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'email_address' => $this->faker->email,
            'address_street' => $this->faker->streetAddress,
            'address_city' => $this->faker->city,
            'address_province' => $this->faker->state,
            'address_country' => $this->faker->country,
            'address_zip' => $this->faker->postcode,
        ];
    }
}
