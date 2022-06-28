<?php

    $idCategoria = $_POST['txIdCategoria'];
    $categoria = $_POST['txCategoria'];    

    include("conexao.php");

    $stmt = $pdo->prepare("update tbCategoria set 
                             categoria='$categoria'
                            Where idCategoria='$idCategoria'");	
	$stmt ->execute();

    header("location:categoria.php");
?>