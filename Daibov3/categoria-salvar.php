<?php

$idCategoria = $_POST['txIdCategoria'];
$categoria = $_POST['txCategoria'];

include("conexao.php");

if ($idCategoria > 0) {
    $stmt = $pdo->prepare("update tbCategoria set 
                             categoria='$categoria'
                            where idCategoria='$idCategoria'");
} else {
    $stmt = $pdo->prepare("insert into tbCategoria values(null,'$categoria');");
}


$stmt->execute();

header("location:categoria.php");
