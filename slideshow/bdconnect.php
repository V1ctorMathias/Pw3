<?php
$servername = "localhost";
$database = "aula_upload";
$username = "root";
$password = "301062Vi";

//Criando a conexão
$conn = mysqli_connect($servername, $username, $password, $database);

//Checando conexão
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
//echo "conexão feita";