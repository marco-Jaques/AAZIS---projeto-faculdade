<?php
$host = 'ballast.proxy.rlwy.net';
$dbname = 'railway';
$user = 'root';
$pass = 'wMFrZaPRzpVwAaNDppPLwOKhtudXNtPy';
$port = '50225';

try {
    $conexao = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // ❌ Não coloque echo, print_r, var_dump, etc. aqui!
} catch (PDOException $e) {
    die("Falha ao conectar ao banco de dados: " . $e->getMessage());
}
?>
