<?php
require_once 'conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];

$sql = "INSERT INTO clientes (nome, email) VALUES ('$nome', '$email')";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Salvar Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="menu-top">
        <a href="index.php">Início</a>
    </div>
    
    <div class="box" style="text-align: center;">
        <?php
        if ($conn->query($sql) === TRUE) {
            echo "<h2>Cliente salvo com sucesso!</h2>";
        } else {
            echo "<h2>Erro ao salvar:</h2> <p>" . $conn->error . "</p>";
        }
        ?>
        <a href="cliente_form.html" class="btn-voltar">Cadastrar Outro</a>
        <a href="cliente_exibir.php" class="btn-voltar">Ver Clientes</a>
    </div>
</body>
</html>