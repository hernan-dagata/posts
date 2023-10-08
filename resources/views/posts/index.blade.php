<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Posts</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        
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
        <h3><center> Gestión de Posts </center></h3>
        <hr>
        <form action="/posts" method="POST">
            <table class="table table-borderless" >
                <tr>
                    <th class="col-3">Id categoría </th>
                    <th class="col-3"> Descripcion </th>
                </tr>
                <tr>
                    <td>
                        @csrf
                        <select name="idCategoria" style="width: 200px; height: 30px;" required>
                            <option value="" selected>-</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td> 
                        <input type="text" name="descripcion" style="width: 200px; height: 30px;" placeholder="Descripción del post" minlength="3" required></input>
                    </td>
                    <td> 
                        <button type="submit">Agregar</button>
                    </td>
                </tr>
            </table>
        </form>
        <hr>
        <h3>Lista de Posts</h3>
        <table class="table table-bordered" border="1">
            <thead>
                <tr>
                    <th class="col-2">Id</th>
                    <th class="col-4">Categoría</th>
                    <th class="col-4">Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->category->nombre }}</td>
                        <td>{{ $post->descripcion }}</td>
                        <td class="text-center align-middle">
                            <button onclick="showEditModalPost({{ $post->id }}, {{ $post->category->id }}, '{{ $post->descripcion }}')">Editar</button>
                        </td>
                        
                        <td class="text-center align-middle">
                            <form onsubmit="return confirm('¿Estás seguro de querer eliminar este post?');" action="/posts/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="editPostModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPostModalLabel">Editar Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="updatePostForm">
                            @csrf
                            @method('PUT')
                            
                            <label for="editPostDescripcion">Descripción:</label>
                            <input type="text" id="editPostDescripcion" name="descripcion" required>
                            
                            <label for="editPostCategoria">Categoría:</label>
                            <select id="editPostCategoria" name="idCategoria" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="updatePost()">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <center> Company MVC - Todos los derechos reservados © 2023 </center>
        </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="{{ asset('js/categories.js') }}"></script>
        <script src="{{ asset('js/posts.js') }}"></script>
    </body>
</html>
