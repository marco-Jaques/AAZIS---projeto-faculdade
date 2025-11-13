<?php
include 'conexao.php';

$cliente_id = $_POST['cliente_id'];
$modelo = $_POST['modelo'];
$servico = $_POST['servico'];
$funcionario = $_POST['funcionario'];
$partes = $_POST['partes'];

try {
    // 1️⃣ Insere o serviço
    $stmt = $conn->prepare("INSERT INTO servicos (cliente_id, modelo, servico, funcionario, partes)
                            VALUES (:cliente_id, :modelo, :servico, :funcionario, :partes)");
    $stmt->execute([
        ':cliente_id' => $cliente_id,
        ':modelo' => $modelo,
        ':servico' => $servico,
        ':funcionario' => $funcionario,
        ':partes' => $partes
    ]);

    // 2️⃣ Busca os dados do cliente
    $busca = $conn->prepare("SELECT * FROM clientes WHERE id = :id");
    $busca->execute([':id' => $cliente_id]);
    $cliente = $busca->fetch(PDO::FETCH_ASSOC);

    // 3️⃣ Cria a reserva combinando tudo
    $reserva = $conn->prepare("INSERT INTO reservas (cliente_id, nome, cpf, email, placa, modelo, servico, funcionario, partes)
                               VALUES (:cliente_id, :nome, :cpf, :email, :placa, :modelo, :servico, :funcionario, :partes)");
    $reserva->execute([
        ':cliente_id' => $cliente_id,
        ':nome' => $cliente['nome'],
        ':cpf' => $cliente['cpf'],
        ':email' => $cliente['email'],
        ':placa' => $cliente['placa'],
        ':modelo' => $modelo,
        ':servico' => $servico,
        ':funcionario' => $funcionario,
        ':partes' => $partes
    ]);

    echo json_encode(['status' => 'sucesso']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'erro', 'mensagem' => $e->getMessage()]);
}
?>
