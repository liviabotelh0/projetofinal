<?php
$host = 'localhost';
$dbname = 'projeto_final';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
    exit;
}

function insiraDados($cpf, $email, $senha)
{
    // Implemente aqui a lógica para inserir os dados no banco de dados
    // Utilize o objeto $pdo para executar as consultas

    // Exemplo:
    $stmt = $pdo->prepare("INSERT INTO alunos (cpf, email, senha) VALUES (?, ?, ?)");
    $stmt->execute([$cpf, $email, $senha]);

    return $stmt->rowCount() > 0;
}
?>