<?php


require_once 'config.php';

# Conexión a la base de datos utilizando MySQLi
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}


// mysqli, consulta preparada
$stmt = $conn->prepare("select * FROM productos WHERE nombre = ?");
$nombre = "producto 1";
$stmt->bind_param('s', $nombre);
$stmt->execute();
$consulta = $stmt->get_result();
while ($filas = $consulta->fetch_array()) {
    echo $filas["nombre"]."<br />";
    echo $filas["descripcion"]."<br />";
    echo $filas["precio"]."<br />";
    echo $filas["stock"]."<br />";
}

/*
// ejecutando una consulta simple
$consulta = $conn->query("select * from productos");
$nfilas = mysqli_num_rows($consulta);
if ($nfilas > 0) {
    for ($i = 0; $i < $nfilas; $i++) {
        $fila = mysqli_fetch_array($consulta);
        echo "Producto: " . $fila['nombre'] . '<br/>';
        echo "Precio: " . $fila['precio'] . '<br/>';
    }
}
*/


?>