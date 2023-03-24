<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CONCESIONARIO";

// Crea la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica si la conexión es correcta
if ($conn->connect_error) {
	die("Error al conectarse a la base de datos: " . $conn->connect_error);
}

// Recibe los datos del formulario
$placa = $_POST["placa"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$color = $_POST["color"];

// Prepara la consulta SQL para insertar los datos
$sql = "INSERT INTO AUTO (Placa, Marca, Modelo, Color) VALUES ('$placa', '$marca', $modelo, '$color')";

// Ejecuta la consulta SQL
if (mysqli_query($conn, $sql)) {
    // Mostrar mensaje de registro insertado correctamente
    echo "<script>alert('Registro insertado correctamente');</script>";
    // Limpiar formulario
    $_POST['placa'] = '';
    $_POST['marca'] = '';
    $_POST['modelo'] = '';
    $_POST['color'] = '';
} else {
    echo "Error al insertar registro: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();
//se utiliza para redirigir al usuario a la página de formulario HTML después de que se haya mostrado el mensaje de alerta 
// Refresh:1 (es el tiempo en segundos para recargar la pagina y el usuario pueda leer el mensaje de alerta)
header("Refresh:1; url=index.html");
?>