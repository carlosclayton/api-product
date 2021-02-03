<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Product;

/**
 * Class ProductTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProductTransformer extends TransformerAbstract
{
    /**
     * Transform the Product entity.
     *
     * @param \App\Models\Product $model
     *
     * @return array
     */
    public function transform(Product $model)
    {
        return [
            'id'         => (int) $model->id,
            'name' => $model->name,
            'description' => $model->description,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
