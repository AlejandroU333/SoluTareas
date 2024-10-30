<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa<br>";

// Crear base de datos
$sql = "CREATE DATABASE Gestor_de_tareas";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada exitosamente<br>";
} else {
    echo "Error al crear la base de datos: " . $conn->error . "<br>";
}

$conn->close();
?>
<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "Gestor_de_tareas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// SQL para crear tabla `roles`
$sql = "CREATE TABLE roles (
    id_rol INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla roles creada exitosamente<br>";
} else {
    echo "Error al crear la tabla roles: " . $conn->error . "<br>";
}

// SQL para crear tabla `usuarios`
$sql = "CREATE TABLE usuarios (
    id_usuario INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(40) NOT NULL,
    clave_usuario VARCHAR(80) NOT NULL,
    email_usuario VARCHAR(80)NOT NULL,
    celular_usuario VARCHAR(12)NOT NULL,
    direccion_usuario VARCHAR(80)NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (rol_id) REFERENCES roles(id)
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla usuarios creada exitosamente<br>";
} else {
    echo "Error al crear la tabla usuarios: " . $conn->error . "<br>";
}

// SQL para crear tabla `estados`
$sql = "CREATE TABLE estados (
    id_estado INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre_estado VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla estados creada exitosamente<br>";
} else {
    echo "Error al crear la tabla estados: " . $conn->error . "<br>";
}

// SQL para crear tabla `prioridades`
$sql = "CREATE TABLE prioridades (
    id_prioridades INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    descripcion TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla prioridades creada exitosamente<br>";
} else {
    echo "Error al crear la tabla prioridades: " . $conn->error . "<br>";
}

// SQL para crear tabla `tareas`
$sql = "CREATE TABLE tareas (
    id_tareas INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT,
    usuario_id INT(6) UNSIGNED,
    estado_id INT(6) UNSIGNED,
    prioridad_id INT(6) UNSIGNED,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_vencimiento DATE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (estado_id) REFERENCES estados(id),
    FOREIGN KEY (prioridad_id) REFERENCES prioridades(id)
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla tareas creada exitosamente<br>";
} else {
    echo "Error al crear la tabla tareas: " . $conn->error . "<br>";
}

$conn->close();
?>

