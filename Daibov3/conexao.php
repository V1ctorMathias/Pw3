<?php
$servidor = "localhost";
$banco = "bdpw3";
$usuario = "root";
$senha = "301062Vi";

$pdo = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
?>
<?php
$con = mysqli_connect($servidor, $usuario, $senha, $banco);
?>
