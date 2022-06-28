<?php
include("cabecalho_menu_rodape.php");
include("conexao.php");
?>

<section class="centro">
	<div>
		<h1> Exibir produtos </h1>
	</div>

	<section class="sec-form">

		<!--<form method="post" action="produto-inserir.php">-->
		<form method="post" action="produto-salvar.php">
			<div>
				<input type="hidden" placeholder="idProduto" name="txIdProduto" value="<?php echo @$_GET['idProduto']; ?>" />
			</div>

			<div>
				<input type="text" class="tx" placeholder="Produto" name="txProduto" value="<?php echo @$_GET['produto']; ?>" />
			</div>

			<!-- Categorias -->
			<?php
			$stmtCat = $pdo->prepare("select * from tbCategoria");
			$stmtCat->execute();
			?>
			<div>
				<?php
				$cat = @$_GET['categoria'];
				?>

				<select name="txIdCategoria" class="tx sel">
					<option value='0'> Escolha uma categoria </option>
					<?php
					while ($rowCat = $stmtCat->fetch(PDO::FETCH_BOTH)) {
						if ($cat == $rowCat[1]) {
							$sel = "selected";
						} else {
							$sel = "";
						}
						echo "<option value='$rowCat[0]' $sel> $rowCat[1] </option>";
					}
					?>
				</select>
				<!-- <input type="text" placeholder="idCategoria" name="txIdCategoria" />-->
			</div>
			<!-- Fim Categorias -->

			<div>
				<input type="text" placeholder="Valor" class="tx" name="txValor" value="<?php echo @$_GET['valor']; ?>" />
			</div>

		<div>

		</div>		

			<div>
				<input type="submit" value="Salvar" class="bt" />
			</div>
		</form>

	</section>

	<section>

		<table>
			<!--<th>Id</th> -->
			<th>Produto</th>
			<th>Categoria</th>
			<th>Valor</th>
			<th> &nbsp; </th>
			<th> &nbsp; </th>

			<tbody>
				<?php
				$stmt = $pdo->prepare("select p.idProduto,p.produto,c.categoria,p.valor
					from tbproduto p
					inner join tbcategoria c
					on p.idCategoria = c.idCategoria");
				$stmt->execute();

				while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {

					echo "<tr>";
					//echo "<td> $row[0] </td>";
					echo "<td> $row[1] </td>";
					echo "<td> $row[2] </td>";
					echo "<td> $row[3] </td>";
					echo "<td>";
					echo "<a href='produto-excluir.php?id=$row[0]'> Excluir </a>";
					echo "</td>";

					echo "<td>";
					echo "<a href='?idProduto=$row[0]&produto=$row[1]&categoria=$row[2]&valor=$row[3]'> Alterar </a>";
					echo "</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>

	</section>

</section>

<?php include("rodape.php"); ?>