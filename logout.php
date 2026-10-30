<?php
session_start();
// Limpa o array da sessão
$_SESSION = array();

// Destrói os cookies de sessão no navegador se existirem
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destrói a sessão no servidor
session_destroy();

// Redireciona para a página de login
header("Location: index.php");
exit;
?>
