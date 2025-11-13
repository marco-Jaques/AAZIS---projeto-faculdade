<?php
header('Content-Type: application/json');
require_once 'conexao.php';

try {
    // Exemplo de inserção
    $stmt = $pdo->prepare("INSERT INTO clientes (nome, cpf, email, placa) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['nome'], $_POST['cpf'], $_POST['email'], $_POST['placa']]);

    echo json_encode([
        'status' => 'sucesso',
        'mensagem' => 'Cliente cadastrado com sucesso!',
        'id' => $pdo->lastInsertId()
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'erro',
        'mensagem' => 'Erro ao cadastrar cliente: ' . $e->getMessage()
    ]);
}
?>

