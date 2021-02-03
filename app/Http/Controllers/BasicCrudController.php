<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;


/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="API RESTFUL Laravel 8",
 *      description="L5 Swagger OpenApi description",
 *      @OA\Contact(
 *          email="carlos.clayton@gmail.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */


abstract class BasicCrudController extends Controller
{
    protected abstract function model();
    protected abstract function rulesStore();
    protected abstract function rulesUpdate();

    public function index()
    {
        return $this->model()->paginate(10);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rulesStore());
        return $this->model()->create($request->all());
    }

    public function show($id)
    {
        $obj = $this->model()->findOrFail($id);
        return $obj;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rulesUpdate());
        $obj = $this->model()->findOrFail($id);
        $obj->update($request->all());
        return $obj;
    }


    public function destroy($id)
    {
        $obj = $this->model()->findOrFail($id);
        $obj->delete();
        return response()->noContent(); // 204
    }
}
