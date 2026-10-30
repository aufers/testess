<?php
session_start();

// Proteção da página: se não estiver logado, redireciona para o login
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Usuário</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 40px; }
        .painel-container { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); max-width: 600px; margin: 0 auto; text-align: center; }
        h1 { color: #333; }
        .btn-logout { display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #dc3545; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; }
        .btn-logout:hover { background-color: #c82333; }
    </style>
</head>
<body>

<div class="painel-container">
    <h1>Bem-vindo ao Painel, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</h1>
    <p>Esta é uma área totalmente restrita e segura.</p>
    <p>Seus dados foram validados diretamente através do Banco de Dados.</p>
    
    <a href="logout.php" class="btn-logout">Sair do Sistema</a>
</div>

</body>
</html>