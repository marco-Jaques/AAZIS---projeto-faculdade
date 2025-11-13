<?php
include("conexao.php");

$cliente_id = $_POST['cliente_id'] ?? '';
$modelo = $_POST['modelo'] ?? '';
$servico = $_POST['servico'] ?? '';
$funcionario = $_POST['funcionario'] ?? '';
$partes = $_POST['partes'] ?? '';

try {
    $stmt = $pdo->prepare("INSERT INTO servicos (cliente_id, modelo, servico, funcionario, partes) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$cliente_id, $modelo, $servico, $funcionario, $partes]);

    echo json_encode(['status' => 'sucesso']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'erro', 'mensagem' => $e->getMessage()]);
}
?>
