# Ajax - CRUD  | Leer datos

Este código muestra como leer datos desde una base de datos MySQL y mostrarlos dentro de una vista html.

## Read

Una vez que se hace la consulta desde PHP (**read.php**)
```php
$read = mysqli_query($conexion, "SELECT id, nombre, prefijo, idioma FROM paises");
```
Se guardan los datos desde una variable de tipo array llamada **$paises[]** y se envía en formato json

```php
echo json_encode([
	'paises'=> $paises
]);
```

Así desde la vista **index.php** se procesa la información mediante javascript

```js
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
```
El resultado obtenido es el siguiente:

![https://github.com/jalberet/ajax/capturas/resultado.png](https://github.com/jalberet/ajax/blob/main/capturas/resultado.png)
