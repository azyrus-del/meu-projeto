<?php
require_once 'conexao.php';

if (isset($_GET['id'])) {
    $id_produto = $_GET['id'];
    $sql = "SELECT * FROM produtos WHERE id_produto = $id_produto";
    $resultado = $conn->query($sql);
    $produto = $resultado->fetch_assoc();
} else {
    header("Location: produto_exibir.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

    <div class="menu-top">
        <a href="index.php">Início</a>
        <a href="cliente_exibir.php">Clientes</a>
        <a href="produto_exibir.php">Produtos</a>
        <a href="venda_exibir.php">Vendas</a>
        <a href="item_venda_exibir.php">Itens de Venda</a>
    </div>

    <div class="box">
        <h2>Editar Produto</h2>
        <form action="produto_editar_acao.php" method="POST" id="meuForm">
            <input type="hidden" name="id_produto" value="<?php echo $produto['id_produto']; ?>">
            
            <label>Descrição do Produto:</label>
            <input type="text" name="dsc_produto" value="<?php echo $produto['dsc_produto']; ?>" class="validar">
            
            <label>Valor Unitário (R$):</label>
            <input type="number" step="0.01" name="vlr_unit" value="<?php echo $produto['vlr_unit']; ?>" class="validar">
            
            <button type="submit">Salvar Alterações</button>
        </form>
        <div style="text-align: center; margin-top: 15px;">
            <a href="produto_exibir.php" class="btn-voltar">Cancelar</a>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
