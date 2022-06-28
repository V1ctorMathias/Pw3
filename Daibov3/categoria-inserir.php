<?php

$categoria = $_POST['txCategoria'];

include("conexao.php");

$stmt = $pdo->prepare("insert into tbCategoria values(null,'$categoria');");
$stmt->execute();

header("location:categoria-exibir.php");
