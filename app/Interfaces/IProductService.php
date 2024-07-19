<?php

namespace App\Interfaces;

use App\Models\Product;

interface IProductService
{

    public function createProduct(Product $product, $file);


}
