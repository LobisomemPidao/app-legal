 <?php
require_once '../app/models/pessoaModel.php';
require_once '../config/db.php'; // configuração PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $telefone = $_POST['telefone'] ?? null;

    $pessoaModel = new PessoaModel($pdo);

    $result = $pessoaModel->create($nome, $cpf, $telefone);

    if ($result) {
        header("Location: pessoa.php?msg=success");
    } else {
        echo "Erro ao cadastrar pessoa.";
    }
}
?>


