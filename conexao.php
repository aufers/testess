<?php
$host = 'db.fr-roub1.bengt.wasmernet.com';
$dbname = 'sistema_login';
$username = 'user_6f91f5d8'; // Altere se o seu usuário do MySQL for diferente
$password = 'pw_PoJ9p7PyT9eN2lrUtSnPuZSLIeFqhZqU';     // Altere se o seu MySQL tiver senha

try {
    // Inicializa a conexão usando PDO
    $pdo = new PDO("mysql:host=$host;port=20184;dbname=$dbname;charset=utf8", $username, $password);
    // Configura o PDO para lançar exceções em caso de erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}
?>
