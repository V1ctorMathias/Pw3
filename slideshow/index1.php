<?php
require './bdconnect.php';

$msg = false;
if (isset($_FILES['arquivo'])) {
  $arquivo = $_FILES['arquivo']['name'];
  $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));

  $novo_nome = md5(time()) . "." . $extensao;

  $diretorio = "upload/";

  move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome);

  $sql_code = "INSERT INTO arquivo(id, arquivo, data) VALUES('','$novo_nome', NOW())";

  if (mysqli_query($conn, $sql_code))
    $msg = "Arquivo enviado com sucesso!";
  else
    $msg = "Falha ao enviar arquivo!";
}
$sql_busca = "SELECT * FROM arquivo";
$mostrar = mysqli_query($conn, $sql_busca);
$qtd_arquivos = mysqli_num_rows($mostrar);
$msg_sem = ($qtd_arquivos <= 0) ? "NÃO HÁ ARQUIVOS NO SISTEMA!" : "";
?>


<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="style.css" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>

  
  <p><?= $msg_sem ?></p>



  <?php
  if (isset($msg) && $msg != false) {
    echo "<p>$msg</p>";
  }
  ?>
  <br />
  <form action="index.php" method="post" enctype="multipart/form-data">
     <input type="file" name="arquivo" />
    <input type="submit" value="Enviar" />
  </form>

  <div class="content">
    <div class="slides">
      <input type="radio" name="slide" id="slide1" checked />
      <input type="radio" name="slide" id="slide2" />
      <input type="radio" name="slide" id="slide3" />
      <input type="radio" name="slide" id="slide4" />
      <input type="radio" name="slide" id="slide5" />

      <div class="slide s1">
        <?php
        while ($dados = mysqli_fetch_array($mostrar)) {
          $arquivo = $dados['arquivo'];
        ?>
          <img class="img-fluid col-md-2 img-thumbnail" src="./upload/<?= $arquivo ?>" />
          <p>olá</p>
        <?php } ?>
        
      </div>

      <div class="slide">
        <img src="./images/2.jpg" alt="anúncio" />
      </div>

      <div class="slide">
        <img src="./images/3.jpg" alt="anúncio" />
      </div>

      <div class="slide">
        <img src="./images/4.jpg" alt="anúncio" />
      </div>

      <div class="slide">
        <img src="./images/5.jpg" alt="anúncio" />
      </div>
    </div>

    <div class="navigation">
      <label class="bar" for="slide1"></label>
      <label class="bar" for="slide2"></label>
      <label class="bar" for="slide3"></label>
      <label class="bar" for="slide4"></label>
      <label class="bar" for="slide5"></label>
    </div>
  </div>

     <div class="texto">

     

  <?php

  include 'conexao.php';
  $sql = "SELECT * FROM tbproduto";
  $buscar = mysqli_query($con, $sql);

  while ($dados = mysqli_fetch_array($buscar)) {

    $produto = $dados['produto'];
    $valor = $dados['valor'];


  ?>

  


    <section class="flex">
      <div>
        
        <p>Produto: <?php echo $produto ?> <br> Valor: R$<?php echo $valor ?>,00</p>
      </div>
      <div>
    </section>


  <?php } ?>

  </div>    

</body>

</html>