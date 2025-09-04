<?php
class pessoaModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($nome, $cpf, $telefone = null) {
        $sql = "INSERT INTO pessoa (nome, cpf, telefone) VALUES (:nome, :cpf, :telefone)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':telefone' => $telefone
        ]);
    }
}
?>
