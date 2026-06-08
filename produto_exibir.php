<?php
require_once 'conexao.php';

$sql = "SELECT * FROM produtos WHERE status = 'A'";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="menu-top">
        <a href="index.php">Início</a>
        <a href="cliente_exibir.php">Clientes</a>
        <a href="produto_exibir.php">Produtos</a>
        <a href="venda_exibir.php">Vendas</a>
        <a href="item_venda_exibir.php">Itens de Venda</a>
    </div>

    <div class="tabela-container">
        <h2>Produtos Cadastrados</h2>
        <a href="produto_form.html" class="btn-voltar" style="margin-top:0;">+ Novo Produto</a>
        
        <?php
        if ($resultado->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Descrição</th><th>Valor Unitário (R$)</th><th>Ações</th></tr>";
            
            while($linha = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $linha["id_produto"] . "</td>";
                echo "<td>" . $linha["dsc_produto"] . "</td>";
                echo "<td>" . number_format($linha["vlr_unit"], 2, ',', '.') . "</td>";
                echo "<td>
                        <a href='produto_editar_form.php?id=" . $linha["id_produto"] . "' style='color: #3498db; text-decoration: none; font-weight: bold; margin-right: 10px;'>Editar</a>
                        <a href='produto_inativar.php?id=" . $linha["id_produto"] . "' style='color: #FF4C4C; text-decoration: none; font-weight: bold;'>Inativar</a>
                      </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='margin-top:20px;'>Nenhum produto cadastrado.</p>";
        }
        
        $conn->close();
        ?>
    </div>
</body>
</html>
