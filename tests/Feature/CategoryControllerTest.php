<?php

namespace Tests\Feature;

use App\Models\Category;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    private $category;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $attr = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence
        ];

        $this->category = Category::create($attr);

    }

    /**
     * @test
     * @testdox Index controller
     * @group ignore
     */
    public function testIndex()
    {

        $response = $this->getJson('/api/categories');
        $response
            ->assertStatus(200)
            ->assertSeeText($this->category->name)
            ->assertSeeText($this->category->description);
    }

    public function testStore()
    {
        $attr = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence
        ];


        $response = $this->postJson( '/api/categories', $attr);
        $response
            ->assertStatus(201)
            ->assertSeeText($attr['name'])
            ->assertSeeText($attr['description']);

    }
    public function testStoreNameNotNull()
    {

        $response = $this->postJson( '/api/categories',[
            'name' => ''
        ]);
        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name']);


    }

    public function testStoreValidationNameMax()
    {

        $response = $this->postJson( '/api/categories',[
            'name' => $this->faker->sentence(258)
        ]);
        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name']);

    }



    public function testShow()
    {

        $response = $this->getJson('/api/categories/' . $this->category->id );
        $response
            ->assertStatus(200)
            ->assertSeeText($this->category->name)
            ->assertSeeText($this->category->description);

    }

    public function testUpdate()
    {
        $name = $this->faker->name;

        $response = $this->putJson('/api/categories/'. $this->category->id, [
            'name' => $name
        ]);

        $response
            ->assertStatus(200)
            ->assertSeeText($name);


    }

    public function testUpdateNameNotNull()
    {

        $response = $this->putJson('/api/categories/'. $this->category->id, [
            'name' => ''
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name']);

    }

    public function testUpdateDescriptionNull()
    {

        $response = $this->putJson('/api/categories/'. $this->category->id, [
            'name' => $this->faker->name,
            'description' => null
        ]);

        $response->assertStatus(200);
        $this->assertNull($response->json('description'));

    }

    public function testDestroy()
    {

        $response = $this->deleteJson('/api/categories/' . $this->category->id);
        $response
            ->assertStatus(204)
            ->assertNoContent();

    }
}
