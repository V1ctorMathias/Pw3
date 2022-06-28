<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="stylesim2.css">

    <title>Site</title>
</head>

<body>

    <header>

        <nav>
            <ul class="nav__links">

                <li> <a href="produto-exibir.php"> Produtos </a> </li>
                <li> <a href="categoria.php"> Categorias </a> </li>
                <li> <a href="api-cep.php"> CEP </a> </li>
                <li> <a href="categoria-json.php"> JSON </a> </li>
                
            </ul>
        </nav>

        <a class="cta" href="pgcontrole.php"><button>Home</button></a>

    </header>


<?php

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index1.php");
    exit;
}

?>

<h1 style="text-align: center;">Página restrita</h1>
<p style="text-align: center; color: #edf0f1;">Olá, <?php echo $_SESSION['UsuarioNome']; ?>!</p>

<?php

echo "<br>";
echo " <a href='dologout.php'><p style='text-align: center;'>Sair</p></a>";
?>