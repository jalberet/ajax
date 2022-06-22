<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Guardar datos de formulario con AJAX</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >      
    </head>
    <body>
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col align-self-center">
                    <div class="card">
                        <div class="card-body">
                            <form id="form_guardar">
                                <div class="form-group">
                                    <label for="pais">Nombre del País</label>
                                    <input type="text" name="nombre" class="form-control" id="pais" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="prefijo">Prefijo</label>
                                    <input type="text" name="prefijo" class="form-control" id="prefijo" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="idioma">Idioma</label>
                                    <input type="text" name="idioma" class="form-control" id="idioma" autocomplete="off">
                                </div>
                                <button type="submit" class="btn btn-success">Registrar</button>
                            </form>
                            <br>
                            <br>
                            <button class="btn btn-primary" onclick="get_paises()">Actualizar tabla</button>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Prefijo</th>
                                        <th scope="col">Idioma</th>
                                    </tr>
                                </thead>
                                <tbody id="content_paises">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
        <script>

            $('#form_guardar').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type:'post',
                    url: 'create.php',
                    data: $(this).serialize(),   
                    cache: false,
                    beforeSend : function(){
                        console.log('Enviando datos');
                    },
                    success: function(response)
                    {
                        console.log('Datos guardado correctamente');
                        //LIMPIA EL FORMULARIO
                        $('#form_guardar')[0].reset();
                        get_paises();
                    },
                    error: function(er) {
                        console.log(er);
                    }
                });
            });

            function get_paises()
            {
                $.ajax({
                    type:'post',
                    url: 'read.php',
                    data: {},   
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    beforeSend : function(){
                        console.log('Obteniendo datos');
                    },
                    success: function(response)
                    {
                        $('#content_paises').empty();
                        $.each(response.paises, function(key, pais) {
                            $('#content_paises').append(`
                                <tr>
                                    <th scope="row">${key+1}</th>
                                    <td>${pais.nombre}</td>
                                    <td>${pais.prefijo}</td>
                                    <td>${pais.idioma}</td>
                                </tr>
                            `);
                        });
                    },
                    error: function(er) {
                        console.log(er);
                    }
                });
            }
        </script>
    </body>
</html>


