<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/main.css" rel="stylesheet">
    <title>Gerenciamento</title>
</head>
<body class="paginanotas">

<section class="menu alinhamento">
    <div class="menu-imagem2">
        <img src="./images/v8_4.png">
    </div>

    <div class="gerenciamento">
        <h1>Gerenciamento de matérias<h1>
    </div>
</section>
<section>

<?php
require_once "db.php";
$numero_da_matricula = $_GET['numero_da_matricula'];
global $pdo;

$stmt = $pdo->prepare('SELECT nome FROM alunos WHERE numero_da_matricula = ?');
$stmt->execute([$numero_da_matricula]);
$alunos = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<div class="nome-aluno">
    <h1>Aluno: <?php echo $alunos['nome']; ?><h1>
</div>
</br>
</br>
<?php

$stmt1 = $pdo->prepare('SELECT * FROM boletim WHERE numero_da_matricula = ?');
$stmt1->execute([$numero_da_matricula]);
 $notas = $stmt1->fetchAll(PDO::FETCH_ASSOC);
if (count($notas)== 0) {
echo '<p>Nenhuma nota lançada.</p>';
} else {

echo "<div class='notas'>";
echo '<table border="1">';
echo '<tr>';
echo '<thead><tr><th>Educação Física</th> <th>Matemática</th> <th>Português</th><th>Biologia</th><th>Geografia</th><th>
História</th></tr></thead>';
echo '<tbody>';

foreach ($notas as $nota) {
echo '<tr>';
echo '<td>' . $nota['educacaofisica'] . '</td>';
echo '<td>' . $nota['matematica'] . '</td>'; 
echo '<td>' . $nota['portugues'] . '</td>';
echo '<td>' . $nota['biologia'] . '</td>';
echo '<td>' . $nota['geografia'] . '</td>';
echo '<td>' . $nota['historia'] . '</td>';
echo '</tr>';
}

echo '</tbody>';
echo '</table>';
echo '</div>';
}
?>
</section>

      

</body>
</html>