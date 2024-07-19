<?php

namespace App\Services;

use App\Interfaces\IProductService;
use App\Models\Product;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Session;

class ProductService implements IProductService
{

    public function createProduct(Product $product, $file)
    {
        $fileUploaded = cloudinary()->upload($file->getRealPath(), ["folder" => "laravel_login_crud"]);
        $id = $fileUploaded->getPublicId();
        $product->image_url = $fileUploaded->getSecurePath();
        $product->email = Session::get('user')->email;
        $product->save();

        $partes = explode('/', $id);

        $loQueEstaDespuesDelSlash = $partes[1];
        // return $loQueEstaDespuesDelSlash;


    }
}
