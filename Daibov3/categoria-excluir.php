<?php
    $id = $_GET['id'];
    
    include("conexao.php");

    $stmt = $pdo->prepare("delete from tbCategoria where idCategoria='$id'");	
	$stmt ->execute();

    header("location:categoria.php");
?>