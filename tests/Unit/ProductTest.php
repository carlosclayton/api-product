<?php

namespace Tests\Unit;

use App\Models\Product;
use Tests\TestCase;
class ProductTest extends TestCase
{
    /**
     * @test
     * @testdox Class exist
     */
    public function testClassExist()
    {
        $product = new Product();
        $this->assertInstanceOf(Product::class, $product);
    }

    /**
     * @test
     * @testdox Fillable fields
     */
    public function testFillable()
    {
        $category = new Product();
        $array = ['name', 'description', 'type'];
        $this->assertEquals($array, $category->getFillable());
    }

    /**
     * @test
     * @testdox new Instance
     */
    public function testNewInstance(){
        $attr = [
            'name' => $this->faker->name
        ];
        $category = new Product($attr);
        self::assertEquals($attr, $category->getAttributes());
    }

}
