<?php
$conn = new mysqli("localhost", "root", "", "Sistema");

if ($conn->connect_error) {
    die("erro de conexão: " .   $conn->connect_error);
}
?>