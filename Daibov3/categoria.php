<?php
include("cabecalho_menu_rodape.php");
include("conexao.php");
?>

<section class="centro">
	<div>
		<h1> Categorias </h1>
	</div>

	<section class="sec-form">

		<!--<form method="post" action="produto-inserir.php">-->
		<form method="post" action="categoria-salvar.php">

			<div>
				<input type="text" placeholder="Categoria" class="tx" name="txCategoria" />
			</div>

			<div>
				<input type="submit" value="Salvar" class="bt" />
			</div>
		</form>

	</section>

	<section>

		<table>
			<th>Categoria</th>
			<th> &nbsp; </th>
			<th> &nbsp; </th>

			<tbody>
				<?php
				$stmt = $pdo->prepare("select * from tbCategoria");
				$stmt->execute();

				while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {

					echo "<tr>";
					echo "<td> $row[1] </td>";

					echo "<td>";
					echo "<a href='categoria-excluir.php?id=$row[0]'> Excluir </a>";
					echo "</td>";

					echo "<td>";
					echo "<a href='?idCategoria=$row[0]&categoria=$row[1]'> Alterar </a>";
					echo "</td>";

					echo "</tr>";
				}
				?>
			</tbody>
		</table>

	</section>

</section>

<?php include("rodape.php"); ?>