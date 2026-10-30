<?php
session_start();
require_once 'conexao.php'; // Importa a conexão com o banco

// Se o usuário já estiver logado, redireciona direto para o painel
if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header('Location: painel.php');
    exit;
}

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_digitado = trim($_POST['usuario'] ?? '');
    $senha_digitada = $_POST['senha'] ?? '';

    if (!empty($usuario_digitado) && !empty($senha_digitada)) {
        try {
            // Prepared Statement para buscar o usuário de forma segura
            $stmt = $pdo->prepare("SELECT id, usuario, senha FROM usuarios WHERE usuario = :usuario LIMIT 1");
            $stmt->bindParam('usuario', $usuario_digitado, PDO::PARAM_STR);
            $stmt->execute();
            
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            var_dump();

            // Verifica se o usuário existe e se a senha confere com o hash do banco
            if ($usuario && password_verify($senha_digitada, $usuario['senha'])) {
                // Login bem-sucedido: Salva os dados na sessão
                $_SESSION['logado'] = true;
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['usuario'];

                header('Location: painel.php');
                exit;
            } else {
                $erro = "Usuário ou senha incorretos!";
            }
        } catch (PDOException $e) {
            $erro = "Erro no sistema.";
        }
    } else {
        $erro = "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-container { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 100%; max-width: 350px; text-align: center; }
        h2 { color: #333; margin-bottom: 20px; }
        input[type="text"], input[type="password"] { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background-color: #28a745; border: none; border-radius: 4px; color: white; font-size: 16px; cursor: pointer; font-weight: bold; }
        button:hover { background-color: #218838; }
        .erro { color: #dc3545; background-color: #f8d7da; padding: 10px; border-radius: 4px; margin-bottom: 15px; font-size: 14px; }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Acesso ao Sistema</h2>
    
    <?php if (!empty($erro)): ?>
        <div class="erro"><?php echo htmlspecialchars($erro); ?></div>
    <?php endif; ?>

    <form action="index.php" method="POST">
        <input type="text" name="usuario" placeholder="Usuário" required autofocus>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
    <br>
<a href="cadastro.php">Cadastro</a>
		
</div>

</body>
</html>
