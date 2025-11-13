<?php
$host = 'ballast.proxy.rlwy.net'; // host público do Railway
$dbname = 'railway'; // nome do banco
$user = 'root'; // usuário do banco
$pass = 'wMFrZaPRzpVwAaNDppPLwOKhtudXNtPy'; // senha
$port = '50225'; // porta pública

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado com sucesso!";
} catch (PDOException $e) {
    die("Falha ao conectar ao banco de dados: " . $e->getMessage());
}
?>
