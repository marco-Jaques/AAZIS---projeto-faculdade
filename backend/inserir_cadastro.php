<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *'); // permite o acesso do front

$host = 'ballast.proxy.rlwy.net'; // o host correto do seu banco Railway (use o da variável MYSQL_PUBLIC_URL)
$dbname = 'railway';
$user = 'root';
$pass = 'wMFrZaPRzpVwAaNDppPLwOKhtudXNtPy';
$port = '50225'; // porta pública que aparece no Railway

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recebe os dados do POST
    $nome = $_POST['nome'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $email = $_POST['email'] ?? '';
    $placa = $_POST['placa'] ?? '';

    // Insere no banco
    $stmt = $pdo->prepare("INSERT INTO clientes (nome, cpf, email, placa) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $cpf, $email, $placa]);

    $id = $pdo->lastInsertId();

    /*echo json_encode([
        'status' => 'sucesso',
        'mensagem' => 'Cliente cadastrado com sucesso!',
        'id' => $id
    ]);*/
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'erro',
        'mensagem' => 'Falha ao conectar ou inserir: ' . $e->getMessage()
    ]);
}
?>
