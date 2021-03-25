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
            'productImgUrl'  => 'http://static1.squarespace.com/static/5253327ee4b03949ba51bd5b/52572567e4b0fdbc78294489/52572e00e4b0fdbc7829c474/1381445120589/new1.gif?format=1500w',
            'productCode'  => $this->faker->numerify('gangaBox-###'),
            'productPosition'  => $this->faker->randomFloat($nbMaxDecimals = 0, $min = 10, $max = 400),
            'categoria_id' => 1
        ];
    }
}
