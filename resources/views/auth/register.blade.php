@vite('resources/js/auth/register/register.js')
@extends('layouts.layout')
@section('title', 'Registro')

@section('register')
    <main class="d-flex justify-content-center align-items-center h-100 w-100">
        <section style="width: 650px;height: 550px; background-color: white" class="shadow rounded-4">
            <h1 class="text-center mt-2">Registro</h1>
            <form action="api/user/register" class="mx-4 needs-validation" id="registerForm" method="POST" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="id_username" class="form-label">Nombre de usuario</label>
                    <input required class="form-control" id="id_username" aria-describedby="emailHelp"
                        placeholder="Ingrese su nombre de usuario" name="username">
                    <div class="invalid-feedback">Ingrese un nombre de usuario</div>

                </div>

                <div class="mb-3">
                    <label for="id_email" class="form-label">Correo</label>
                    <input type="ema" required class="form-control" id="id_email" aria-describedby="emailHelp"
                        placeholder="Ingrese su correo" name="email">
                    <div class="invalid-feedback">Ingrese un correo</div>

                </div>
                <div class="mb-3">
                    <label for="id_password" class="form-label">Contraseña</label>
                    <input type="password" required class="form-control" id="id_password"
                        placeholder="Ingrese su contraseña" name="password">
                    <div class="invalid-feedback ">Ingrese una contraseña</div>
                </div>


                <small class="d-block mb-3 ">¿Ya tienes una cuenta? <a href="login" class="">Inicia sesion</a>
                </small>
                <button type="submit" class="btn btn-primary an_button">Registrarse</button>

                @if (Session::get('Error'))
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>{{ Session::get('Error') }}</strong>
                    </div>
                @endif

                @if (session('Mensaje'))
                    @vite('resources/js/auth/register/success.js')
                @endif
            </form>
        </section>

    </main>
@endsection
