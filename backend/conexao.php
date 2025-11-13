

<?php
$host = 'ballast.proxy.rlwy.net'; // substitua pelo host exato que aparece no painel Railway
$dbname = 'railway'; // nome do banco, geralmente é "railway"
$user = 'root'; // substitua pelo usuário do seu banco (geralmente "root" ou o nome mostrado no painel)
$pass = 'wMFrZaPRzpVwAaNDppPLwOKhtudXNtPy'; // senha exata gerada pelo Railway
$port = '50225'; // ex: 3306 ou 12345, conforme mostrado no painel Railway

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode([
        'status' => 'erro',
        'mensagem' => 'Falha ao conectar ao banco de dados: ' . $e->getMessage()
    ]));
}
?>

