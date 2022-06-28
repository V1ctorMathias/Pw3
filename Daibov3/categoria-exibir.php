<?php
include("cabecalho_menu_rodape.php");
include("conexao.php");

echo "<h1> Exibir Categorias </h1>";
?>

<?php

echo "Exibir Categorias <br />";

include("conexao.php");

$stmt = $pdo->prepare("select * from tbCategoria");
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
	echo $row['idCategoria'];
	echo $row['categoria'];
	echo "<br />";
}
?>

<?php include("rodape.php"); ?>