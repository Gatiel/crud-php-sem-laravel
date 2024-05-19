<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "crud_app";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
