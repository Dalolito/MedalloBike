<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bikeCategories = [
            'Accesorios',
            'Bicicletas de Montaña',
            'Bicicletas de Ruta',
            'Bicicletas Urbanas',
            'Bicicletas Eléctricas',
            'Bicicletas BMX',
            'Cascos',
            'Luces',
            'Herramientas',
            'Repuestos',
            'Ropa Ciclista',
            'Zapatillas',
            'Accesorios',
            'Componentes',
            'Mantenimiento',
            'Neumáticos',
            'Frenos',
            'Pedales',
            'Sillines',
            'Manubrios',
            'Ruedas',
            'Bombas de Aire',
            'Portabicicletas',
            'Computadoras para Bicicleta',
            'Botellas y Portabotellas',
            'Protección',
            'Mochilas',
            'Alforjas',
            'Lubricantes',
            'Candados y Seguridad',
        ];

        return [
            'name' => $this->faker->unique()->word,
            'state' => $this->faker->randomElement(['available', 'disabled']),
        ];
    }

    /**
     * Indicate that the category is available.
     */
    public function available(): static
    {
        return $this->state(fn (array $attributes) => [
            'state' => 'available',
        ]);
    }

    /**
     * Indicate that the category is disabled.
     */
    public function disabled(): static
    {
        return $this->state(fn (array $attributes) => [
            'state' => 'disabled',
        ]);
    }
}
