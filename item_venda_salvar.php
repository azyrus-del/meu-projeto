<?php
require_once 'conexao.php';

$id_venda = $_POST['id_venda'];
$id_produto = $_POST['id_produto'];
$qtd = $_POST['qtd'];

$sql = "INSERT INTO itens_venda (id_venda, id_produto, qtd) VALUES ('$id_venda', '$id_produto', '$qtd')";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Salvar Item da Venda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="menu-top">
        <a href="index.php">Início</a>
    </div>
    
    <div class="box" style="text-align: center;">
        <?php
        if ($conn->query($sql) === TRUE) {
            echo "<h2>Item adicionado com sucesso!</h2>";
        } else {
            echo "<h2>Erro ao adicionar item:</h2> <p>" . $conn->error . "</p>";
        }
        ?>
        <a href="item_venda_form.php" class="btn-voltar">Adicionar Outro Item</a>
        <a href="item_venda_exibir.php" class="btn-voltar">Ver Itens de Venda</a>
    </div>
</body>
</html>
