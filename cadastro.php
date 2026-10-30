<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Cadastro</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }
    body {
      background-color: #f4f6f8;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .cadastro-container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }
    .cadastro-container h2 {
      margin-bottom: 20px;
      color: #333333;
      text-align: center;
    }
    .campo {
      margin-bottom: 15px;
    }
    .campo label {
      display: block;
      margin-bottom: 5px;
      color: #555555;
      font-size: 14px;
    }
    .campo input {
      width: 100%;
      padding: 10px;
      border: 1px solid #cccccc;
      border-radius: 4px;
      font-size: 14px;
    }
    .campo input:focus {
      border-color: #007bff;
      outline: none;
    }
    .botao-enviar {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      border: none;
      border-radius: 4px;
      color: #ffffff;
      font-size: 16px;
      cursor: pointer;
      font-weight: bold;
    }
    .botao-enviar:hover {
      background-color: #0056b3;
    }
    .link-login {
      margin-top: 15px;
      text-align: center;
      font-size: 14px;
      color: #666666;
    }
    .link-login a {
      color: #007bff;
      text-decoration: none;
    }
    .link-login a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="cadastro-container">
    <h2>Criar sua Conta</h2>
    
    <!-- Alterado o método para POST e a ação para direcionar ao seu arquivo PHP -->
    <form action="cadastrar.php" method="POST">
      
      <div class="campo">
        <label for="nome">Nome Completo</label>
        <!-- O atributo 'name' é o que o PHP lerá como $_POST['nome'] -->
        <input type="text" id="nome" name="nome" required placeholder="Digite seu nome">
      </div>
      
      <div class="campo">
        <label for="email">E-mail</label>
        <!-- O atributo 'name' é o que o PHP lerá como $_POST['email'] -->
        <input type="email" id="email" name="email" required placeholder="seu@email.com">
      </div>
      
      <div class="campo">
        <label for="senha">Senha</label>
        <!-- O atributo 'name' é o que o PHP lerá como $_POST['senha'] -->
        <input type="password" id="senha" name="senha" required minlength="6" placeholder="Mínimo 6 caracteres">
      </div>
      
      <button type="submit" class="botao-enviar">Cadastrar</button>
    </form>
    
    <div class="link-login">
      Já tem uma conta? <a href="#">Faça login</a>
    </div>
  </div>

</body>
</html>

