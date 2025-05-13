<?php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$base_de_datos = "pagina_final";

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $contraseña, $base_de_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
} else {
    echo "✅ Conexión exitosa a la base de datos '$base_de_datos'";
}
?>
