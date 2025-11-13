<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'conexao.php';

try {
    // Verifica se a conexão foi estabelecida
    if (!$pdo) {
        throw new Exception("Falha ao conectar ao banco de dados.");
    }

    // Prepara e executa o INSERT
    $stmt = $pdo->prepare("INSERT INTO clientes (nome, cpf, email, placa) VALUES (?, ?, ?, ?)");
    $stmt->execute([
        $_POST['nome'] ?? '',
        $_POST['cpf'] ?? '',
        $_POST['email'] ?? '',
        $_POST['placa'] ?? ''
    ]);

    echo json_encode([
        'status' => 'sucesso',
        'mensagem' => 'Cliente cadastrado com sucesso!',
        'id' => $pdo->lastInsertId()
    ]);
} catch (Exception $e) {
    echo json_encode([
        'status' => 'erro',
        'mensagem' => 'Erro ao cadastrar cliente: ' . $e->getMessage()
    ]);
}
?>
