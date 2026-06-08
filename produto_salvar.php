<?php
require_once 'conexao.php';

$dsc_produto = $_POST['dsc_produto'];
$vlr_unit = $_POST['vlr_unit'];

$sql = "INSERT INTO produtos (dsc_produto, vlr_unit) VALUES ('$dsc_produto', '$vlr_unit')";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Salvar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="menu-top">
        <a href="index.php">Início</a>
    </div>
    
    <div class="box" style="text-align: center;">
        <?php
        if ($conn->query($sql) === TRUE) {
            echo "<h2>Produto salvo com sucesso!</h2>";
        } else {
            echo "<h2>Erro ao salvar:</h2> <p>" . $conn->error . "</p>";
        }
        ?>
        <a href="produto_form.html" class="btn-voltar">Cadastrar Outro</a>
        <a href="produto_exibir.php" class="btn-voltar">Ver Produtos</a>
    </div>
</body>
</html>
