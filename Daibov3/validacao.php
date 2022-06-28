<?php

$conexao = mysqli_connect('localhost', 'root', '301062Vi');
$db = mysqli_select_db($conexao, 'bdpw3');


  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['login']) OR empty($_POST['senha']))) {
      header("Location: index1.php"); exit;
  }

  // Tenta se conectar ao servidor MySQL
  mysqli_connect('localhost', 'root', '301062Vi') or trigger_error(mysqli_error($conexao));
  // Tenta se conectar a um banco de dados MySQL
  mysqli_select_db($conexao, $db) or trigger_error(mysqli_error($conexao));

  $login = mysqli_real_escape_string($conexao, $_POST ['login']);
  $senha = mysqli_real_escape_string($conexao, md5($_POST['senha']));

  // Validação do usuário/senha digitados
 
  $query = mysqli_query($conexao, "SELECT * FROM usuarios WHERE login =
  '$login' AND senha = '$senha'");
 
  if (mysqli_num_rows($query) <= 0) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    echo "Login inválido!"; exit;
} else {
    // Salva os dados encontrados na variável $resultado
    $resultado = mysqli_fetch_assoc($query);

    // Se a sessão não existir, inicia uma
    if (!isset($_SESSION)) session_start();

    // Salva os dados encontrados na sessão
    $_SESSION['UsuarioID'] = $resultado['ID'];
    $_SESSION['UsuarioNome'] = $resultado['login'];
    // Redireciona o visitante
    header("Location: restrito.php"); exit;
}

  ?>