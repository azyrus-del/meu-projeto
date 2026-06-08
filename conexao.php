<?php
$conn = new mysqli("localhost", "root", "", "Sistema2");

if ($conn->connect_error) {
    die("erro de conexão: " .   $conn->connect_error);
}
?>