<?php
// Conexión
$conectar = mysqli_connect("localhost", "root", "", "base");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST["cedula"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $codigo_ciudad = $_POST["ciudad"];
    $edad = $_POST["edad"];
    $profesion = $_POST["profesion"];

    // INSERTAR Y REDIRECCIONAR
    if (isset($_POST["ingresar"])) {
        $insertar = "INSERT INTO datos(cedula,nombre,apellido,direccion,codigo_ciudad,edad,profesion)
                     VALUES($cedula,'$nombre','$apellido','$direccion',$codigo_ciudad,$edad,'$profesion')";
        mysqli_query($conectar, $insertar);

        // Redirección inmediata al index con mensaje
        header("Location: index.html#registro-exitoso");
        exit();
    }

    // CONSULTAR
    if (isset($_POST["consultar"])) {
        $consultar = "SELECT * FROM datos";
        $resultado = mysqli_query($conectar, $consultar);
    }

    // ACTUALIZAR
    if (isset($_POST["actualizar"])) {
        $actualizar = "UPDATE datos SET 
                        nombre='$nombre', 
                        apellido='$apellido', 
                        direccion='$direccion', 
                        codigo_ciudad=$codigo_ciudad, 
                        edad=$edad, 
                        profesion='$profesion'
                       WHERE cedula=$cedula";
        mysqli_query($conectar, $actualizar);
        header("Location: index.html#actualizado");
        exit();
    }

    // ELIMINAR
    if (isset($_POST["eliminar"])) {
        $eliminar = "DELETE FROM datos WHERE cedula=$cedula";
        mysqli_query($conectar, $eliminar);
        header("Location: index.html#eliminado");
        exit();
    }
}
?>
