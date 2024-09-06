<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/79df6d9837.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="d-flex justify-content-center align-items-center p-4 position-relative">
        <h1 class="text-center w-100">REGISTRO LIBROS</h1>
        <a href="/" class="btn btn-warning  position-absolute end-0 top-3 m-3">Menu Principal</a>
    </div>
    <br>


    @if(session("success"))
    <div class="alert alert-success text-center mx-auto" style="max-width: 500px;">
        {{ session("success") }}
    </div>
    @endif


    @if(session("failure"))
    <div class="alert alert-danger text-center mx-auto" style="max-width: 500px;">
        {{session("failure")}}
    </div>
    @endif

    <script>
        var res = function() {
            var not = confirm("Estas seguro de eliminar?")
            return not;
        }
    </script>


    <!-- Modal AGREGAR DATOS-->
    <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalEditLabel">Agregar registro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('libro.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Titulo </label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="titulo">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Genero </label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="genero">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Fecha Publicación </label>
                            <input type="date" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="fechaPublicación">
                        </div>
                        <div class="mb-3">
                            <label for="autor_id" class="form-label">Autor</label>
                            <select class="form-control" id="autor_id" name="autor_id" required>
                                <option value="" disabled selected>Selecciona un autor</option>
                                @foreach($autores as $autor)
                                <option value="{{ $autor->id }}">{{ $autor->nombre }} {{ $autor->apellidos }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalAgregar">Añadir Libro</button>
        <div class="d-flex justify-content-center">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">TITULO</th>
                        <th scope="col">GENERO</th>
                        <th scope="col">FECHA PUBLICACIÓN</th>
                        <th scope="col">AUTOR ID</th>
                        <th scope="col">ACCCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($libros as $libro)
                    <tr>
                        <td>{{$libro->id}}</td>
                        <td>{{$libro->titulo}}</td>
                        <td>{{$libro->genero}}</td>
                        <td>{{$libro->fechaPublicación}}</td>
                        <td>{{ $libro->autor->nombre }} {{ $libro->autor->apellidos }}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modalEdit{{$libro->id}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                            <form action="{{ route('libro.destroy', $libro->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return res()"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>

                        <!-- Modal MODIFICAR DATOS-->
                        <div class="modal fade" id="modalEdit{{$libro->id}}" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalEditLabel">Modificar registro</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('libro.update',$libro->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Titulo </label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="titulo" value="{{$libro->titulo}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Genero </label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="genero" value="{{$libro->genero}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Fecha Publicación </label>
                                                <input type="date" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="fechaPublicación" value="{{$libro->fechaPublicación}}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="autor_id" class="form-label">Autor</label>
                                                <select class="form-control" id="autor_id" name="autor_id" required>
                                                    <option value="" disabled selected>Selecciona un autor</option>
                                                    @foreach($autores as $autor)
                                                    <option value="{{ $autor->id }}">{{ $autor->nombre }} {{ $autor->apellidos }}</option>
                                                    @endforeach
                                                </select>
                                            </div>



                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Modificar</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>
