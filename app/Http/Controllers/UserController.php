<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\IUserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    private IUserService $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function registerView()
    {
        return view('auth.register');
    }
    public function registerUser(RegisterRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $action = $this->userService->registerUser($user);

        $mensaje = "Usuario registrado exitosamente";
        return $action == null ? redirect('register')->with('Mensaje', $mensaje) : $action;

        // return response()->json([
        //     "success" => true,
        //     "message" => "Usuario registrado correctamente",
        //     "user" => $createdUser
        // ]);
    }


    public function loginUser(LoginRequest $request)
    {

        $user = new User();

        $user->fill($request->all());

        $result = $this->userService->loginUser($user);

        if ($result == null) {
            Session::put('logged', "Te has logeado correctamente redirigiendo a dashboard php");
        }

        return $result != null ? $result : redirect('login');

        // return redirect('dashboard');
        // return response()->json([
        //     "message" => "Te has logeado",
        //     "user" => $user
        // ], 200);

    }


    public function getProfile()
    {

        $user = Session::get('user');

        if ($user == null) {
            return response()->json([
                "success" => false,
                "message" => "No estas logeado"
            ], 401);
        }

        return ["message" => "Bienvenido", "user" => $user];
    }

    public function logOut()
    {
        Session::remove('user');
        Session::remove('logged');
        Session::remove('in_dashboard');
        return redirect('login');
    }



    public function edit(string $id)
    {
        //
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
}
