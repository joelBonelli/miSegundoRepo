<?php
require_once 'config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME,DB_PORT);

if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$sql = "SELECT * FROM productos";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    print_r ($result);
    echo
    "Se realizo la consulta" . '<br/>' . '<br/>';
}


$nfilas = mysqli_num_rows($result);
if ($nfilas > 0) {
    for ($i = 0; $i < $nfilas; $i++)
    {
        $fila = mysqli_fetch_array($result);
        echo '<br>'."Producto: " .$fila['nombre'].'<br/>';
        echo "Descripcion: " . $fila['descripcion'] .'<br/>';
        echo "Precio: " . $fila['precio'] .'<br/>';
        echo "Stock: " . $fila['stock'] .'<br/>';
    }
}
#while ($data = mysqli_fetch_array($result)) {
#    echo '<pre>';
#    echo var_dump($data);
#    echo '</spre>';
#}
# echo "ID: " . $row['id'] . " Nombre: " . $row['nombre'] . "<br>";
?>