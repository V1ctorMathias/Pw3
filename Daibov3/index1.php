<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="stylesim2.css" />

    <title>Site</title>
  </head>

  <body>
    <form action="validacao.php" method="post">
      <fieldset>
        <legend style="color: #edf0f1;">Dados de Login</legend>
        <label for="txUsuario" style="color: #edf0f1;">Usuário</label>
        <input type="text" name="login" id="txLogin" maxlength="25" />
        <label for="txSenha" style="color: #edf0f1;">Senha</label>
        <input type="password" name="senha" id="txSenha" />
        <input type="submit" value="Entrar" />
        <br />
        <a href="cadastro1.html">Cadastre-se</a>
      </fieldset>
    </form>
  </body>
</html>
