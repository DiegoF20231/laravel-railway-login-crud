@vite('resources/css/nav.css')
<nav class="container-fluid w-100 bg-primary d-flex justify-content-between align-items-center p-3">
    <h1 class="text-white fs-4">Productos</h1>

    <div>
        @if (Session::get('user'))
            <span class="d-block text-white text-center fs-4">{{ Session::get('user')->username }}</span>
        @endif
        <a class="d-block text-white text-center fs-4" href="api/user/logout">Cerrar Sesion</a>
    </div>

</nav>
