<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agadetec - Início</title>
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

    <h2 style="margin-top: 40px;">Agadetec - Pedro Pereira - Pedro Alves</h2>
    <p style="text-align: center;">Escolha uma das opções para gerenciar o sistema:</p>

    <div class="dashboard-grid">
        <div class="card-item">
            <div class="icon">👤</div>
            <h3>Clientes</h3>
            <a href="cliente_form.html" style="text-decoration:none; width: 100%;"><button>Cliente</button></a>
        </div>
        <div class="card-item">
            <div class="icon">📦</div>
            <h3>Produtos</h3>
            <a href="produto_form.html" style="text-decoration:none; width: 100%;"><button>Produto</button></a>
        </div>
        <div class="card-item">
            <div class="icon">🛒</div>
            <h3>Vendas</h3>
            <a href="venda_form.php" style="text-decoration:none; width: 100%;"><button>Registrar Venda</button></a>
        </div>
        <div class="card-item">
            <div class="icon">📋</div>
            <h3>Itens</h3>
            <a href="item_venda_form.php" style="text-decoration:none; width: 100%;"><button>Adicionar Item na Venda</button></a>
        </div>
    </div>

</body>
</html>