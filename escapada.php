<?php



require_once 'config.php';

# Conexión a la base de datos utilizando MySQLi
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME,DB_PORT);

if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$nombre2 ="joel";
$email2 = "joelbonelli@hotmail.com";
# Escapar valores de usuario
$nombre = $conn->real_escape_string($nombre2);
$email = $conn->real_escape_string($email2);

# Consulta SQL con valores escapados
$query = "SELECT * FROM usuarios WHERE nombre='$nombre' AND email='$email'";

# Ejecutar la consulta
$result = $conn->query($query);

# Procesar resultados
while ($filas = $result->fetch_assoc()) {
# Se Mostraria el resultado
echo  $filas["nombre"] . "<br />";
}

# Cerrar la conexión
$conn->close();
?>