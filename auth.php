<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Se o usuário não estiver logado, redireciona para a página de login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Se o usuário estiver logado, mas não tiver selecionado um perfil,
// e não estiver na própria página de seleção de perfis ou saindo do sistema,
// redireciona para a tela de seleção de perfis
$pagina_atual = basename($_SERVER['PHP_SELF']);
if (!isset($_SESSION['perfil_id']) && $pagina_atual !== 'perfis.php' && $pagina_atual !== 'logout.php') {
    header("Location: perfis.php");
    exit();
}
?>
