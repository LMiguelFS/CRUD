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
        <h1 class="text-center w-100">REGISTRO AUTORES</h1>
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
                    <form action="{{route('autor.sto    re')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre </label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="nombres" require>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Apellidos </label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="apellidos" require>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nacionalidad </label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="nacionalidad" require>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Fecha Nacimiento </label>
                            <input type="date" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="fechaNacimiento" require>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Celular/Telefono </label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="celular" require>
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
        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalAgregar">Añadir Autor</button>
        <div class="d-flex justify-content-center">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDOS</th>
                        <th scope="col">NACIONALIDAD</th>
                        <th scope="col">CELULAR</th>
                        <th scope="col">FECHA NACIMIENTO</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($autores as $autor)
                    <tr>
                        <td>{{$autor->id}}</td>
                        <td>{{$autor->nombres}}</td>
                        <td>{{$autor->apellidos}}</td>
                        <td>{{$autor->nacionalidad}}</td>
                        <td>{{$autor->fechaNacimiento}}</td>
                        <td>{{$autor->celular}}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modalEdit{{$autor->id}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                            <form action="{{ route('autor.destroy', $autor->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return res()"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>

                        <!-- Modal MODIFICAR DATOS-->
                        <div class="modal fade" id="modalEdit{{$autor->id}}" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalEditLabel">Modificar registro</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('autor.update',$autor->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nombre </label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="nombres" value="{{$autor->nombres}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Apellidos </label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="apellidos" value="{{$autor->apellidos}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nacionalidad </label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="nacionalidad" value="{{$autor->nacionalidad}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Fecha Nacimiento </label>
                                                <input type="date" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="fechaNacimiento" value="{{$autor->fechaNacimiento}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Celular/Telefono </label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="celular" value="{{$autor->celular}}">
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
