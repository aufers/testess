<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. Conexão com o banco de dados (ajuste os dados para o seu sistema)
$host = "db.fr-roub1.bengt.wasmernet.com";
$usuario_db = "user_6f91f5d8";
$senha_db = "pw_PoJ9p7PyT9eN2lrUtSnPuZSLIeFqhZqU";
$nome_db = "sistema_login";
$port = "20184";

$conexao = mysqli_connect($host, $usuario_db, $senha_db, $nome_db, $port);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// 2. Receber os dados do formulário (devem bater com o atributo 'name' do HTML)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $senha = $_POST['senha']; // Lembre-se de criptografar a senha em produção (ex: password_hash)
    $email = $_POST['email'];

    // 3. Inserir no banco de dados (ajuste o nome da tabela e das colunas)
    $sql = "INSERT INTO sistema_login (usuario, email, senha) VALUES ('$nome','$email', '$senha')";

    if (mysqli_query($conexao, $sql)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }
}



mysqli_close($conexao);
?>
