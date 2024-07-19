<?php

namespace App\Services;

use App\Interfaces\IUserService;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserService implements IUserService
{

    public function registerUser(User $user)
    {
        $searchedUser = User::where('email', $user->email)->first();



        if ($searchedUser != null) {
            // throw new HttpResponseException(
            //     response()->json(
            //         [
            //             'error' => "Ya existe un usuario con email $user->email"
            //         ],
            //         400
            //     )
            // );
            $mensaje = "Ya existe un usuario con email " . $user->email;
            return redirect('register')->with('Error', $mensaje)->withInput();
        }

        $user->password = Hash::make($user->password);
        $user->save();



    }
    public function loginUser(User $user)
    {
        $searchedUser = User::where('email', $user->email)->first();
        if ($searchedUser == null) {
            // throw new HttpResponseException(
            //     response()->json(
            //         [
            //             'error' => "No existe un usuario con email $user->email"
            //         ],
            //         401
            //     )
            // );
            $mensaje = "No existe un usuario con email $user->email";
            return redirect('login')->with('Error', $mensaje)->withInput();

        }

        if (!Hash::check($user->password, $searchedUser->password) || $user->email != $searchedUser->email) {
            // throw new HttpResponseException(
            //     response()->json(
            //         [
            //             'error' => "Credenciales incorrectas"
            //         ],
            //         401
            //     )
            // );

            $mensaje = "Credenciales incorrectas";
            return redirect('login')->with('Error', $mensaje)->withInput();
        }
        Session::put('user', $searchedUser);

        return null;
        //return $searchedUser;
    }
}
