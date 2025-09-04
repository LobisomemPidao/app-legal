<?php
// Configuração da conexão com o banco
$host = 'localhost';
$dbname = 'pessoa';
$user = 'usuario';
$pass = 'senha';

try {
    $pdo = new PDO("mysql:host=$host;pessoa=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recebe dados do formulário
    $nome = $_POST['nome'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $telefone = $_POST['telefone'] ?? null;

    // Inserção preparada para evitar SQL Injection
    $sql = "INSERT INTO pessoa (nome, cpf, telefone) VALUES (:nome, :cpf, :telefone)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':telefone', $telefone);

    $stmt->execute();

    echo "Pessoa cadastrada com sucesso!!!!! aiiiiii que delecia";
} catch (PDOException $e) {
    echo "Erro ao conectar ou inserir: POHA " . $e->getMessage();
}
?>