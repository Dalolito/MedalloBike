<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bikeBrands = [
            'Specialized', 'Trek', 'Giant', 'Cannondale', 'Scott',
            'Orbea', 'Merida', 'Bianchi', 'BMC', 'Pinarello',
            'Santa Cruz', 'Cervélo', 'Kona', 'GT', 'Lapierre',
            'Cube', 'Focus', 'Colnago', 'Felt', 'Wilier',
            'GW', 'Shimano', 'SRAM', 'Campagnolo', 'Continental',
        ];

        $bikeProducts = [
            'Bicicleta Montaña ' => [
                'prefix' => 'MTB ',
                'desc' => 'Bicicleta de montaña con suspensión y frenos de disco hidráulicos.',
                'price' => [1500000, 8000000],
            ],
            'Bicicleta Ruta ' => [
                'prefix' => 'Road ',
                'desc' => 'Bicicleta de ruta ligera con cuadro de carbono.',
                'price' => [2000000, 12000000],
            ],
            'Casco ' => [
                'prefix' => 'Safety ',
                'desc' => 'Casco de seguridad homologado con ajuste preciso.',
                'price' => [80000, 500000],
            ],
            'Guantes ' => [
                'prefix' => 'Grip ',
                'desc' => 'Guantes ergonómicos con protección para los nudillos.',
                'price' => [25000, 120000],
            ],
            'Luz Delantera ' => [
                'prefix' => 'Bright ',
                'desc' => 'Luz LED recargable por USB con múltiples modos.',
                'price' => [40000, 200000],
            ],
            'Kit de Herramientas ' => [
                'prefix' => 'Pro ',
                'desc' => 'Kit completo de herramientas para mantenimiento de bicicletas.',
                'price' => [150000, 600000],
            ],
            'Botella ' => [
                'prefix' => 'Hydro ',
                'desc' => 'Botella de hidratación térmica con sistema antigoteo.',
                'price' => [20000, 80000],
            ],
            'Portabicicletas ' => [
                'prefix' => 'Carry ',
                'desc' => 'Portabicicletas para vehículos con sistema de seguridad.',
                'price' => [300000, 1200000],
            ],
            'Computadora ' => [
                'prefix' => 'Smart ',
                'desc' => 'Computadora GPS con mapas y seguimiento de rendimiento.',
                'price' => [200000, 800000],
            ],
            'Zapatillas ' => [
                'prefix' => 'Speed ',
                'desc' => 'Zapatillas con suela rígida y sistema de cierre BOA.',
                'price' => [150000, 700000],
            ],
            'Neumático ' => [
                'prefix' => 'Grip ',
                'desc' => 'Neumático con compuesto de alto agarre para todo tipo de terreno.',
                'price' => [60000, 250000],
            ],
            'Frenos ' => [
                'prefix' => 'Stop ',
                'desc' => 'Sistema de frenos hidráulicos con ajuste preciso.',
                'price' => [120000, 500000],
            ],
            'Pedales ' => [
                'prefix' => 'Click ',
                'desc' => 'Pedales automáticos con placas incluidas.',
                'price' => [80000, 350000],
            ],
            'Sillín ' => [
                'prefix' => 'Comfort ',
                'desc' => 'Sillín ergonómico con canal central y acolchado.',
                'price' => [70000, 300000],
            ],
            'Cadena ' => [
                'prefix' => 'Power ',
                'desc' => 'Cadena de alta resistencia con tratamiento anticorrosión.',
                'price' => [40000, 180000],
            ],
        ];

        // Elegir un tipo de producto aleatorio
        $productType = $this->faker->randomElement(array_keys($bikeProducts));
        $productInfo = $bikeProducts[$productType];

        // Construir el título del producto
        $productTitle = $productType.$this->faker->randomNumber(3, true);

        // Elegir una marca aleatoria
        $brand = $this->faker->randomElement($bikeBrands);

        // Generar precio dentro del rango específico para el tipo de producto
        $price = $this->faker->numberBetween($productInfo['price'][0], $productInfo['price'][1]);

        // Generar descripción detallada
        $description = $productInfo['desc'].' '.$brand.' '.$productInfo['prefix'].
                        $this->faker->sentence(5).' Ideal para '.$this->faker->randomElement(['principiantes', 'avanzados', 'profesionales', 'entusiastas', 'competidores']);

        return [
            'title' => $productTitle,
            'description' => $description,
            'category_id' => Category::inRandomOrder()->first()?->getId() ?? 1,
            'image' => 'products/'.$this->faker->numberBetween(1, 10).'.jpg',
            'brand' => $brand,
            'price' => $price,
            'stock' => $this->faker->numberBetween(0, 100),
            'state' => $this->faker->randomElement(['available', 'disabled']),
        ];
    }

    /**
     * Indicate that the product is available.
     */
    public function available(): static
    {
        return $this->state(fn (array $attributes) => [
            'state' => 'available',
        ]);
    }

    /**
     * Indicate that the product is disabled.
     */
    public function disabled(): static
    {
        return $this->state(fn (array $attributes) => [
            'state' => 'disabled',
        ]);
    }

    /**
     * Indicate that the product has a specific category.
     */
    public function forCategory(int $categoryId): static
    {
        return $this->state(fn (array $attributes) => [
            'category_id' => $categoryId,
        ]);
    }

    /**
     * Set the product to have high stock.
     */
    public function highStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'stock' => $this->faker->numberBetween(50, 200),
        ]);
    }

    /**
     * Set the product to have low stock.
     */
    public function lowStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'stock' => $this->faker->numberBetween(1, 10),
        ]);
    }

    /**
     * Set the product to be out of stock.
     */
    public function outOfStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'stock' => 0,
        ]);
    }
}
