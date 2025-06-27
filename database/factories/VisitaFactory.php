<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Visita;
use App\Models\Cliente;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visita>
 */
class VisitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cliente = Cliente::inRandomOrder()->first();

        return [
            'vendedor_id' => $cliente->vendedor->id,
            'cliente_id' => $cliente->id,
            'fecha_visita' => $this->faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'),
            'indicaciones' => $this->faker->sentence(),
            'observaciones' => $this->faker->sentence(),
            'estado' => $this->faker->randomElement([0,1,2]),
        ];  
    }
}
