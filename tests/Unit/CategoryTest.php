<?php

namespace Tests\Unit;

use App\Models\Category;
use Tests\TestCase;
class CategoryTest extends TestCase
{
    /**
     * @test
     * @testdox Class exist
     */
    public function testClassExist()
    {
        $category = new Category();
        $this->assertInstanceOf(Category::class, $category);
    }

    /**
     * @test
     * @testdox Fillable fields
     */
    public function testFillable()
    {
        $category = new Category();
        $array = ['name', 'description'];
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
        $category = new Category($attr);
        self::assertEquals($attr, $category->getAttributes());
    }

}
