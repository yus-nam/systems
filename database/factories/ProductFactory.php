<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'product_name' => $this->faker->realText(20),
            'price' => $this->faker->numberBetween($min = 500, $max = 11000),
            'stock' => $this->faker->numberBetween($min = 0, $max = 20),
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => null,


            // $table->bigIncrements('id');
            // $table->integer('company_id');
            // $table->blob('img_path');
            // $table->string('product_name');
            // $table->integer('price');
            // $table->integer('stock');
            // $table->text('comment')->nullable();
            // $table->timestamps();









        ];
    }
}
