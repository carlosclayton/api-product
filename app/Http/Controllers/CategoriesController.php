<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Validators\CategoryValidator;

/**
 * Class CategoriesController.
 *
 * @package namespace App\Http\Controllers;
 */
class CategoriesController extends BasicCrudController
{

    /**
     * @OA\Get(
     *     tags={"Categories"},
     *     path="/api/categories",
     *     summary="List of categories",
     *     description="Return a list of categories",
     *     @OA\Response(response="200", description="An json"),
     *      security={
     *           {"apiKey": {}}
     *       }
     * )
     */

    /**
     * @OA\Post(
     *      tags={"Categories"},
     *      path="/api/categories",
     *      summary="Store a category",
     *      description="Return message",
     *      @OA\Parameter(
     *          name="name",
     *          description="Name field",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="description",
     *          description="Description",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(response="200", description="Store category"),
     *      security={
     *           {"apiKey": {}}
     *      }
     * )
     */

    /**
     * @OA\Get(
     *     tags={"Categories"},
     *     path="/api/categories/{id}",
     *     operationId="getCategoryById",
     *     @OA\Parameter(
     *          name ="id",
     *          in = "path",
     *          description = "ID of prooduct to return",
     *          required = true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     summary="Show category",
     *     description="Return a category",
     *     @OA\Response(response="200", description="A json"),
     *     security={
     *           {"apiKey": {}}
     *     }
     * )
     */


    /**
     * @OA\Put(
     *      tags={"Categories"},
     *      path="/api/categories/{id}",
     *      summary="Update a category",
     *      description="Update a category",
     *      operationId="getCategoryById",
     *      @OA\Parameter(
     *          name ="id",
     *          in = "path",
     *          description = "ID of category to return",
     *          required = true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="name",
     *          description="Name field",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="description",
     *          description="Description",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(response="200", description="A json"),
     *      security={
     *           {"apiKey": {}}
     *      }
     * )
     */

    /**
     * @OA\Delete(
     *     tags={"Categories"},
     *     path="/api/categories/{id}",
     *     operationId="getCategoryById",
     *     @OA\Parameter(
     *          name ="id",
     *          in = "path",
     *          description = "ID of category to return",
     *          required = true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     summary="Delete a category",
     *     description="Delete a category",
     *     @OA\Response(response="200", description="An json"),
     *     security={
     *           {"apiKey": {}}
     *     }
     * )
     */


    /**
     * @var CategoryRepository
     */
    protected $repository;


    /**
     * @return CategoryRepository
     */
    protected function model()
    {
        return $this->repository;
    }

    /**
     * @return string[]
     */
    protected function rulesStore()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'nullable'
        ];
    }

    /**
     * @return string[]
     */
    protected function rulesUpdate()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'nullable'
        ];
    }


    /**
     * CategorysController constructor.
     *
     * @param CategoryRepository $repository
     * @param CategoryValidator $validator
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }
}
