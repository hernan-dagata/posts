<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de posts</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <h1><center> Módulo de gestión </center></h1>
    <nav class="navbar bg-body-tertiary">
        <form class="container justify-content-center">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-success me-2">Inicio</a>
            <a href="{{ route('categories.indexView') }}" class="btn btn-outline-success me-2">Gestionar Categorías</a>
            <a href="{{ route('posts.indexView') }}" class="btn btn-outline-success">Gestionar Posts</a>
        </form>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    <footer>
        <center> Company MVC - Todos los derechos reservados © 2023 </center>
    </footer>

</body>
</html>
