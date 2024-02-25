<?php
#Inicializacion de conexion a la base de datos
require '../helpers/init_conn_db.php';

if(!$conn){
    die("Conexion Fallida");
}

$sql = "SELECT * FROM users";
                $query = $conn->query($sql);

                echo "$query->num_rows";
?>