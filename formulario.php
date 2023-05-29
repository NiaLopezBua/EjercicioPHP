<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio PHP</title>
    <link rel="stylesheet" type="text/css" href="formulario.css">
</head>

<body>
    <div class="group">
        <form method="POST" action="">
            <h2><em>Formulario de Registro</em></h2>
            <label for="nombre">Nombre<span><em>(requerido)</em></span></label>
            <input type="text" name="nombre" class="form-input" required/>

            <label for="apellido">Apellido<span><em>(requerido)</em></span></label>
            <input type="text" name="apellido"  class="form-input" required/>

            <label for="email">Email<span><em>(requerido)</em></span></label>
            <input type="email" name="email" class="form-input" required/>

            <input class="form-btn" name="submit" type="submit" value="Suscribirse"/>

<?php

if($_POST) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

//Conexión PDO (Permite acceder a diferentes bbdd con un controlador específico, mysql, oracle, etc.)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ejerciciosql";

//Para crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

//Para comprobar la conexión creamos un condicional
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Creamos una 'query'
$sql = "INSERT INTO usuario (nombre, apellido, email)
VALUES ('$nombre', '$apellido', '$email')";

//Mensajes de registro correcto o incorrecto
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//Siempre hay que cerrar la conexión a las bbdd, importante!
$conn->close();

}

?>

</form>
</div>
</body>
</html>



