<?php
require_once 'db.php';

// Inicializar as variáveis
$cpf = $email = $senha = '';
$successMessage = $errorMessage = '';

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os dados do formulário
    $numero_da_matricula = $_POST['numero_da_matricula'];
    $senha = $_POST['senha'];

    // Validar os dados do formulário (exemplo de validação simples)
    if(empty($numero_da_matricula) || empty($senha)) {
        $errorMessage = 'Por favor, preencha todos os campos.';
    } else {
        // Realizar ações no banco de dados usando as funções do arquivo db.php

        // Exemplo: Inserir os dados no banco de dados
        if (inserirDados($numero_da_matricula, $senha)) {
            $successMessage = 'login realizado com sucesso!';
        } else {
            $errorMessage = 'Erro ao realizar o login.';
        }
    }
}

function inserirDados($numero_da_matricula, $senha)
{
    global $pdo;
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM alunos WHERE numero_da_matricula = ? AND senha = ?");
        $stmt->execute([$numero_da_matricula, $senha]);
        $count = $stmt->fetchColumn();

        if ($count > 0){
        header("location: minhasnotas.php?numero_da_matricula=$numero_da_matricula");
        }
        else {
            echo "<p>Aluno não encontrado</p>";
        }
    } catch (PDOException $e) {
        echo 'Erro ao inserir dados: ' . $e->getMessage();
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .success-message {
            color: green;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <?php if (!empty($successMessage)) : ?>
            <p class="success-message"><?php echo $successMessage; ?></p>
        <?php endif; ?>
        <?php if (!empty($errorMessage)) : ?>
            <p class="error-message"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label for="numero_da_matricula">Matricula:</label>
                <input type="text" id="numero_da_matricula" name="numero_da_matricula" required>
            </div> 
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div> 
            <button type="submit" name="submit" value="Enviar">Enviar</button>
        </form>
    </div>
</body>
</html>