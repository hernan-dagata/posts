<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Categorías</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="{{ asset('js/categories.js') }}"></script>
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
        <h3><center> Gestión de categorías </center></h3>
        <hr>
        <form action="/categories" method="POST">
            <table class="table table-borderless">
                <tr>
                    <th>Categoría</th>
                </tr>
                <tr>
                    <td>
                        @csrf
                        <input type="text" name="nombre" style="width: 200px; height: 30px;" class="col-7" placeholder="Nombre de la categoría" minlength="3" required></input>
                    </td>
                    <td> 
                        <button type="submit">Agregar</button>
                    </td>
                </tr>
            </table>
            
        </form>
        <hr>
        <h3>Lista de Categorías</h3>
        <table class="table table-bordered" border="1">
            <thead>
                <tr>
                    <th class="col-3">Id</th>
                    <th class="col-7">Categoría</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->nombre }}</td>
                        <td class="text-center align-middle">
                            <button onclick="showEditModal({{ $category->id }}, '{{ $category->nombre }}')">Editar</button>
                        </td>
                        
                        <td class="text-center align-middle">
                            <form onsubmit="return confirm('¿Estás seguro de querer eliminar esta categoría?');" action="/categories/{{ $category->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryModalLabel">Editar Categoría</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="updateCategoryForm">
                            @csrf
                            @method('PUT')
                            <input type="text" id="editCategoryName" name="nombre" required>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="updateCategory()">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <center> Company MVC - Todos los derechos reservados © 2023 </center>
        </footer>

    </body>
</html>