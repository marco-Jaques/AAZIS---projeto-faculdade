
<?php
$host = 'mysql.railway.internal'; // coloque o host exato do seu Railway MySQL
$dbname = 'railway'; // nome do banco
$user = 'root'; // ou outro user mostrado no painel
$pass = 'wMFrZaPRzpVwAaNDppPLwOKhtudXNtPy'; // substitua pela senha do Railway
$port = '3306'; // a porta que aparece no painel

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conectado com sucesso!";
} catch (PDOException $e) {
    die("Falha ao conectar ao banco de dados: " . $e->getMessage());
}
?>


