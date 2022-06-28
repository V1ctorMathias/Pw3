<?php include("cabecalho_menu_rodape.php")  ?>
<?php include("conexao.php"); ?>

<section class="resultado">

  <?php
  $stmt = $pdo->prepare("select count(*) from tbProduto");
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_NUM);
  echo "Total de produtos: $row[0]";
  ?>

  <?php
  $stmt2 = $pdo->prepare("select sum(valor) from tbProduto");
  $stmt2->execute();
  $row2 = $stmt2->fetch(PDO::FETCH_NUM);
  echo "<br>Soma dos valores dos produtos: $row2[0]";
  ?>

</section>

<?php
$mb = 10;
$b = 5;
$r = 1;
$i = 4;
?>

<?php
$stmt = $pdo->prepare("select count(*) from tbProduto");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_NUM);
echo "Total de produtos: $row[0]";
?>

<?php
$stmt2 = $pdo->prepare("select sum(valor) from tbProduto");
$stmt2->execute();
$row2 = $stmt2->fetch(PDO::FETCH_NUM);
echo "Soma dos valores dos produtos: $row2[0]";
?>

<?php
$stmt3 = $pdo->prepare("select avg(valor) from tbProduto");
$stmt3->execute();
$row3 = $stmt3->fetch(PDO::FETCH_NUM);
echo "Média dos valores dos produtos: $row3[0]";
?>

<?php
$stmt4 = $pdo->prepare("select max(valor) from tbProduto");
$stmt4->execute();
$row4 = $stmt4->fetch(PDO::FETCH_NUM);
echo "Valor do produto mais caro: $row4[0]";
?>

<?php
$stmt5 = $pdo->prepare("select min(valor) from tbProduto");
$stmt5->execute();
$row5 = $stmt5->fetch(PDO::FETCH_NUM);
echo "Valor do produto mais barato: $row5[0]";
?>



<html>

<head>
  <link rel="stylesheet" href="stylesim2.css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Nota', 'Alunos'],
        ['MB', 11],
        ['B', 5],
        ['R', 2],
        ['I', 1]
      ]);

      var options = {
        title: 'Notas dos Alunos',
        titleTextStyle: {
          color: '#edf0f1'
        },
        legend: {

          textStyle: {
            color: '#edf0f1'
          }
        },

        backgroundColor: {
          fillOpacity: 0
        },

      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);

    }
  </script>

  <script type="text/javascript">
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Cidade", "População", {
          role: "blue"
        }],

        <?php

        include 'conexao.php';
        $sql = "SELECT * FROM cidades";
        $buscar = mysqli_query($con, $sql);

        while ($dados = mysqli_fetch_array($buscar)) {

          $cidade = $dados['cidade'];
          $populacao = $dados['populacao'];



        ?>

          ["<?php echo $cidade ?>", <?php echo $populacao ?>, "blue"],

        <?php } ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
        {
          calc: "stringify",
          sourceColumn: 1,
          type: "string",
          role: "annotation"
        },
        2
      ]);

      var options = {
        title: "População das Cidades",
        width: 600,
        height: 400,
        bar: {
          groupWidth: "95%"
        },
        legend: {
          position: "none"
        },

        titleTextStyle: {
          color: '#edf0f1'
        },
        legend: {
          textStyle: {
            color: '#edf0f1'
          }

        },
        backgroundColor: {
          fillOpacity: 0
        }



      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
    }
  </script>


</head>

<body>

  <div id="piechart" style="width:50%; height: 500px; position: fixed;"></div>

  <div id="barchart_values" style=" padding-left: 50%;"></div>

</body>

</html>