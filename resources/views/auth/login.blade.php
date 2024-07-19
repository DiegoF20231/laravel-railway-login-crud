@vite('resources/js/auth/login/login.js')
@extends('layouts.layout')
@section('title', 'Inicio de sesion')
@section('login')
    <main class="d-flex justify-content-center align-items-center h-100 w-100">
        <section style="width: 650px;height: 550px; background-color: white" class="shadow rounded-4">
            <h1 class="text-center mt-2">Inicio de sesion</h1>
            <form action="api/user/login" class="mx-4 needs-validation" method="POST" id="loginForm" novalidate>
                @csrf
                <div class="mb-3  ">
                    <label for="id_email" class="form-label">Correo</label>
                    <input name="email" value="{{ old('email') }}" required class="form-control" id="id_email"
                        aria-describedby="emailHelp" placeholder="Ingrese su correo">
                    <div class="invalid-feedback">Ingrese un correo</div>



                </div>
                <div class="mb-3 ">
                    <label for="id_password" class="form-label">Contraseña</label>
                    <input name="password" value="{{ old('password') }}" type="password" required class="form-control"
                        id="id_password" placeholder="Ingrese su contraseña">
                    <div class="invalid-feedback ">Ingrese una contraseña</div>
                </div>



                <small class="d-block mb-3 ">¿No tienes una cuenta? <a href="register" class="">Haz
                        click aqui</a>
                </small>
                <button type="submit" class="btn btn-primary an_button mb-3">Iniciar Sesion</button>

                @if (Session::get('Error'))
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>{{ Session::get('Error') }}</strong>
                    </div>
                @endif


                @if (Session::get('logged'))
                    @vite('resources/js/auth/login/success.js')
                    <script>
                        setTimeout(() => {
                            window.location.href = "/dashboard"
                        }, 1700)
                    </script>
                @endif




            </form>
        </section>

    </main>
@endsection
