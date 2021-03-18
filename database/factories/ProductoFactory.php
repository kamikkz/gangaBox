<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'productName' => $this->faker->lexify('## productName - ???'),
            'productPrice'  => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 200),
            'productImgUrl'  => $this->faker->imageUrl('cats'),
            'productCode'  => $this->faker->numerify('gangaBox-###'),
            'productPosition'  => $this->faker->randomFloat($nbMaxDecimals = 0, $min = 1, $max = 4),
            'categoria_id' => $this->faker->numerify(1)
        ];
    }
}
