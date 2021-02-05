<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\ProductRepository;
use App\Validators\ProductValidator;

/**
 * Class ProductsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductsController extends BasicCrudController
{


    /**
     * @OA\Get(
     *     tags={"Products"},
     *     path="/api/products",
     *     summary="List of products",
     *     description="Return a list of products",
     *     @OA\Response(response="200", description="An json"),
     *      security={
     *           {"apiKey": {}}
     *       }
     * )
     */

    /**
     * @OA\Post(
     *      tags={"Products"},
     *      path="/api/products",
     *      summary="Store a product",
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
     *          name ="category_id",
     *          in = "path",
     *          description = "ID of category to return",
     *          required = true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="type",
     *          description="Type field",
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
     *     @OA\Response(response="200", description="Store product"),
     *      security={
     *           {"apiKey": {}}
     *      }
     * )
     */

    /**
     * @OA\Get(
     *     tags={"Products"},
     *     path="/api/products/{id}",
     *     operationId="getProductById",
     *     @OA\Parameter(
     *          name ="id",
     *          in = "path",
     *          description = "ID of prooduct to return",
     *          required = true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     summary="Show product",
     *     description="Return a product",
     *     @OA\Response(response="200", description="A json"),
     *     security={
     *           {"apiKey": {}}
     *     }
     * )
     */


    /**
     * @OA\Put(
     *      tags={"Products"},
     *      path="/api/products/{id}",
     *      summary="Update a product",
     *      description="Update a product",
     *      operationId="getProductById",
     *      @OA\Parameter(
     *          name ="id",
     *          in = "path",
     *          description = "ID of product to return",
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
     *          name ="category_id",
     *          in = "path",
     *          description = "ID of category to return",
     *          required = true,
     *          @OA\Schema(
     *              type="integer"
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
     *     tags={"Products"},
     *     path="/api/products/{id}",
     *     operationId="getProductById",
     *     @OA\Parameter(
     *          name ="id",
     *          in = "path",
     *          description = "ID of product to return",
     *          required = true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     summary="Delete a product",
     *     description="Delete a product",
     *     @OA\Response(response="200", description="An json"),
     *     security={
     *           {"apiKey": {}}
     *     }
     * )
     */


    /**
     * @var ProductRepository
     */
    protected $repository;


    /**
     * @return ProductRepository
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
     * ProductsController constructor.
     *
     * @param ProductRepository $repository
     * @param ProductValidator $validator
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

}
