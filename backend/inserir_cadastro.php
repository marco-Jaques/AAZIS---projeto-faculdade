<?php
require_once 'conexao.php';

$nome = $_POST['nome'] ?? '';
$cpf = $_POST['cpf'] ?? '';
$email = $_POST['email'] ?? '';
$placa = $_POST['placa'] ?? '';

try {
    $stmt = $pdo->prepare("INSERT INTO clientes (nome, cpf, email, placa) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $cpf, $email, $placa]);

    echo json_encode([
        'status' => 'sucesso',
        'id' => $pdo->lastInsertId()
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'erro',
        'mensagem' => $e->getMessage()
    ]);
}
?>
