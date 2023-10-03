<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopilar datos del formulario
    $nombre = $_POST["nombre"];
    $password_registro = $_POST["password_registro"];
    
    // Validar y procesar los datos (en una aplicación real, debes hacer validaciones más robustas)

    // Establecer la conexión a la base de datos (ajusta las credenciales según tu configuración)
    $servername = "tu_host";
    $username = "tu_usuario";
    $password = "tu_contraseña";
    $dbname = "tablapaginaweb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Insertar datos en la base de datos (en una aplicación real, utiliza sentencias preparadas)
    $sql = "INSERT INTO tablapaginaweb (NombreUsuario, passUsuario) VALUES ('$nombre', '$password_registro')";

    if ($conn->query($sql) === TRUE) {
        // Redirigir a otra página después del registro exitoso
        header("index.html");
        exit; // Asegura que el script se detenga después de la redirección
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
