<?php

require_once 'config.php';

# Conexión a la base de datos utilizando MySQLi
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME,DB_PORT);

if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

# Consulta SQL con sentencia preparada
$query = "SELECT * FROM usuarios WHERE nombre=?";
$stmt = $conn->prepare($query);

# Enlazar valores de forma segura
$usuario = 'joel';
//$password = 'root';

$stmt->bind_param("s", $usuario);
//$stmt->bind_param("ss", $usuario, $password);

#$usuario = $_POST['usuario'];
#$password = $_POST['password'];

# Ejecutar la consulta
$stmt->execute();

# Procesar resultados
$result = $stmt->get_result();
while ($filas = $result->fetch_assoc()) {
    # Se Mostraria el resultado
    echo $filas["nombre"] . "<br />";
    echo $filas["apellido"] . "<br />";
    echo $filas["email"] . "<br />";
}


# Cerrar la sentencia y la conexión
$stmt->close();
$conn->close();

?>