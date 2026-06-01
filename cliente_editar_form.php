<?php
require_once 'conexao.php';

if (isset($_GET['id'])) {
    $id_cliente = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id_cliente = $id_cliente";
    $resultado = $conn->query($sql);
    $cliente = $resultado->fetch_assoc();
} else {
    header("Location: cliente_exibir.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
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

    <div class="box">
        <h2>Editar Cliente</h2>
        <form action="cliente_editar_acao.php" method="POST" id="meuForm">
            <input type="hidden" name="id_cliente" value="<?php echo $cliente['id_cliente']; ?>">
            
            <label>Nome do Cliente:</label>
            <input type="text" name="nome" value="<?php echo $cliente['nome']; ?>" class="validar">
            
            <label>Email do Cliente:</label>
            <input type="email" name="email" value="<?php echo $cliente['email']; ?>" class="validar">
            
            <button type="submit">Salvar Alterações</button>
        </form>
        <div style="text-align: center; margin-top: 15px;">
            <a href="cliente_exibir.php" class="btn-voltar">Cancelar</a>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>