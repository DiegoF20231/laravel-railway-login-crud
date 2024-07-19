<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\DashboardMiddleware;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


// Route::post('hola', function (CreateProductRequest $request) {

//     return $request->description;
// });
// Route::post('createProduct', [ProductController::class, 'create']);


// Route::get('/saludar/{nombre}', function (string $nombre) {
//     return "Hola " . $nombre;
// });

// Route::get('/productos', function () {
//     $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
//     $pares = array_filter($array, fn($numero) => $numero % 2 == 0);
//     return $pares;
// })->middleware(AuthMiddleware::class);



// Route::get('/about', fn() => view('auth.about'));

// Route::get('/users', function () {
//     $user = User::where('email', "diego@gmail.com")->first();


//     return $user->getProducts;
// });

// Route::get('/product', function () {
//     $product = Product::where('product_id', 1)->first();

//     return response()->json(["producto" => $product, "user" => $product->getUser]);
// });

Route::controller(UserController::class)->group(function () {

    Route::prefix("api/user")->group(function () {
        Route::post("login", 'loginUser');
        Route::post("register", 'registerUser');
        Route::get("profile", 'getProfile');
        Route::get("logout", 'logOut');
    });
    Route::middleware(AuthMiddleware::class)->group(function () {
        Route::get('/login', [UserController::class, 'loginView']);
        Route::get('/register', [UserController::class, 'registerView']);
    });

});

Route::middleware(DashboardMiddleware::class)->controller(ProductController::class)->group(function () {

    Route::prefix("api/product")->group(function () {
        Route::post("createProduct", 'createProduct');
        Route::get("{id}", 'deleteProduct');
        Route::post("editProduct", "editProduct");
    });

    Route::get('dashboard', 'dashboardView');
});

// Route::get('productos', function () {
//     $email = Session::get('user')->email;
//     $products = User::where('email', $email)->first()->getProducts;
//     return $products;
// });


// Route::get('dashboard', function () {

//     Session::put('in_dashboard', true);
//     return view('dashboard.dashboard');
// })->middleware(DashboardMiddleware::class);


// Route::post('file', function (Request $request) {
//     // $fileName = $request->file('Archivo')->getClientOriginalName();
//     // $extension = $request->file('Archivo')->getClientOriginalExtension();

//     // $file = $request->file('file');


//     // $uploadedFileUrl = cloudinary()->upload($file->getRealPath(), ["folder" => "laravel_login_crud"])->getSecurePath();

//     return ["Hola" => "Hola"];
//     ;
// });

// Route::get('file', function () {
//     return view('file');
// });

// Route::delete('eliminar/{id}', function ($id) {
//     cloudinary()->destroy('laravel_login_crud/' . $id);
//     return "Eliminado";
// });



