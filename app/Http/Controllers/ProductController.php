<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Interfaces\IProductService;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    private IProductService $productService;
    public function __construct(IProductService $productService)
    {
        $this->productService = $productService;
    }
    public function dashboardView()
    {
        $email = Session::get('user')->email;
        $products = User::where('email', $email)->first()->getProducts;
        Session::put('in_dashboard', true);
        return view('dashboard.dashboard', ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createProduct(CreateProductRequest $request)
    {
        $product = new Product();
        $file = $request->file('file');
        $product->fill($request->all());
        $id = $this->productService->createProduct($product, $file);
        //return $id;
        $mensaje = "Producto creado correctamente";

        return redirect('dashboard')->with('Mensaje', $mensaje);



    }


    public function getProducts()
    {
        $email = Session::get('user')->email;
        $products = User::where('email', $email)->first()->getProducts;
        return $products;
    }
    public function store(Request $request)
    {
        //
    }

    public function deleteProduct(string $id)
    {
        $product = Product::where("product_id", $id)->first();
        $split = explode('/', $product->image_url);
        $id = explode('.', $split[8]);
        cloudinary()->destroy('laravel_login_crud/' . $id[0]);
        $product->delete();
        $mensaje = "Producto eliminado";
        return redirect('dashboard')->with('DeleteMessage', $mensaje);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function editProduct(Request $request)
    {
        $product = Product::where('product_id', $request->id)->first();
        $product->price = $request->price;
        $product->description = $request->description;
        $product->name = $request->name;

        if ($request->file('file') != null) {
            $split = explode('/', $product->image_url);
            $id = explode('.', $split[8]);
            cloudinary()->destroy('laravel_login_crud/' . $id[0]);
            $fileUploaded = cloudinary()->upload($request->file('file')->getRealPath(), ["folder" => "laravel_login_crud"]);
            $url = $fileUploaded->getSecurePath();
            $product->image_url = $url;


        }
        $product->save();
        $mensaje = "Producto actualizado";
        return redirect('dashboard')->with('editMessage', $mensaje);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
