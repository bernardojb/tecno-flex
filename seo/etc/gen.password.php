<?php
# ------------------ #
# Author: Kauê Porte #
# ------------------ #
# --------------------------------------------------
header("Content-Type: text/html; charset=utf-8", true);
# --------------------------------------------------
# Variables
# --------------------------------------------------
$mode = $_GET['mode'];
?>
<html>
<body>
<?php
switch($mode)
{
  # --------------------------------------------------
  case "":
  # --------------------------------------------------
?>
<form action="?mode=generate" method="post">
  <input type="text" name="password">
  <button type="submit">Gerar</button>
</form>    
<?php
  break;
  # --------------------------------------------------
  case "generate":
  # --------------------------------------------------
    $password      = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
?>
<form action="?mode=compare" method="post">
  <input type="text" name="password1" value="<?=$password?>">
  <input type="text" name="password2" value="<?=$password_hash?>">
  <button type="submit">Comparar</button>
</form>
<?php
  break;
  # --------------------------------------------------
  case "compare":
  # --------------------------------------------------
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if(password_verify($password1, $password2))
    {
      echo 'A senha bate com o hash gerado!';
      echo '<br><br>';
      echo 'Senha: '.$password1;
      echo '<br><br>';
      echo 'Hash: '.$password2;
      echo '<br><br>';
      echo '<a href="gen.password.php">Voltar(novo hash)</a>';
    }
    else
    {
      echo 'A senha NÃO bate com o hash gerado!';
      echo '<br><br>';
      echo 'Senha: '.$password1;
      echo '<br><br>';
      echo 'Hash: '.$password2;
      echo '<br><br>';
      echo '<a href="gen.password.php">Voltar(novo hash)</a>';
    }
  break;
}
?>
</body>
</html>