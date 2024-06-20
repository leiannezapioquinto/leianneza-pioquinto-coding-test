<?php

namespace App\Repositories;

use App\Models\Products;

class ProductRepository implements ProductRepositoryInterface
{
    protected $product;

    public function __construct(Products $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {
        return $this->product->all();
    }

    public function getById($id)
    {
        return $this->product->find($id);
    }

    public function create(array $attributes)
    {
        return $this->product->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $product = $this->product->find($id);
        if ($product) {
            $product->update($attributes);
            return $product;
        }
        return null;
    }

    public function delete($id)
    {
        $product = $this->product->find($id);
        if ($product) {
            return $product->delete();
        }
        return false;
    }
}
