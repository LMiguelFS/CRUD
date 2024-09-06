<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Autores y Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>

    <h1 class="text-center p-4">Registro de Autores y Libros</h1>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://liteitesm.wordpress.com/wp-content/uploads/2013/05/autor.jpg?w=640" class="card-img-top" alt="Autores">
                    <div class="card-body text-center">
                        <h5 class="card-title">AUTORES</h5>
                        <p class="card-text">Registra a los autores para la reserva de derechos y gestión de publicaciones.</p>
                        <a href="autor" class="btn btn-primary">REGISTRAR</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://www.upb.edu.co/es/imagenes/imgtipod-blgleyendosinseparador-megustarialeer-1464204951973.jpg" class="card-img-top" alt="Libros">
                    <div class="card-body text-center">
                        <h5 class="card-title">LIBROS</h5>
                        <p class="card-text">Registra los libros para su seguimiento, edición y distribución.</p>
                        <a href="libro" class="btn btn-primary">REGISTRAR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
