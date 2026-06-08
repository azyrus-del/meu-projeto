<?php
require_once 'conexao.php';

// Uso de JOIN para buscar o nome do cliente associado à venda
$sql = "SELECT v.id_venda, v.dat_venda, c.nome AS nome_cliente 
        FROM vendas v 
        INNER JOIN clientes c ON v.id_cliente = c.id_cliente";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Vendas</title>
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
        <h2>Vendas Registradas</h2>
        <a href="venda_form.php" class="btn-voltar" style="margin-top:0;">+ Nova Venda</a>
        
        <?php
        if ($resultado->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID Venda</th><th>Cliente</th><th>Data da Venda</th></tr>";
            
            while($linha = $resultado->fetch_assoc()) {
                // Formata a data para o padrão brasileiro
                $data_formatada = date('d/m/Y', strtotime($linha["dat_venda"]));
                echo "<tr>";
                echo "<td>" . $linha["id_venda"] . "</td>";
                echo "<td>" . $linha["nome_cliente"] . "</td>";
                echo "<td>" . $data_formatada . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='margin-top:20px;'>Nenhuma venda registrada.</p>";
        }
        
        $conn->close();
        ?>
    </div>
</body>
</html>
