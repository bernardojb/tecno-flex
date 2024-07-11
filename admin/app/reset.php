<?php

# --------------------------------------------------
header("Content-Type: text/html; charset=utf-8", true);
# --------------------------------------------------
# Includes
# --------------------------------------------------
require_once '../lib/cfg.global.php';
require_once '../lib/fcn.password.php';
# --------------------------------------------------
# Login check
# --------------------------------------------------
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
# --------------------------------------------------
$sql        = "SELECT * FROM users WHERE user_email = ?";
$arrayParam = array($email);
$data_user  = $crud_usr->getSQLGeneric($sql, $arrayParam, false);
# --------------------------------------------------
# Sessions
# --------------------------------------------------
if(!empty($data_user))
{
  $new_password  = generatePassword(8,false,'lud');
  $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
  # ----------
  $arrayUpdate = array(
    'user_password' => $password_hash
  );
  $arrayCond = array('user_email=' => $email);
  $return    = $crud_usr->update($arrayUpdate, $arrayCond);
  # --------------------------------------------------
  # E-mail new password
  # --------------------------------------------------
  $name          = 'Sistema';
  $subject       = 'Painel Administrativo | Solicitação de nova senha';
  $name_h        = "=?UTF-8?B?".base64_encode($name)."?=";
  $subject_h     = "=?UTF-8?B?".base64_encode($subject)."?=";
  $recipient     = $email;
  $email_content = "
  Você solicitou uma nova senha de acesso para o Painel Administrativo do seu website.<br>
  Sua nova senha é: <b>$new_password</b><br><br>
  Faça login no sistema utilizando a nova senha. Em seguida, clique no seu nome no canto direito superior da tela e realize a troca da senha para uma de sua preferência.
  ";
  # ----------
  $email_headers  = "MIME-Version: 1.0\r\n";
  $email_headers .= "Content-type: text/html; charset=UTF-8\r\n";
  $email_headers .= "From: $name_h <$email>";
  # ----------
  if (mail($recipient, $subject_h, $email_content, $email_headers))
  {
    echo '<script type="text/javascript">';
    echo 'alert("Uma nova senha foi enviada para seu e-mail");';
    echo 'window.location.href="http://'.$_SERVER[HTTP_HOST].'/admin/";';
    echo '</script>';
  }
  else
  {
    echo '<script type="text/javascript">';
    echo 'alert("Ocorreu um erro - Tente novamente mais tarde");';
    echo 'window.history.back();';
    echo '</script>';
  }
}
else
{
  # ----------
  echo '<script type="text/javascript">';
  echo 'alert("E-mail não encontrado");';
  echo 'window.history.back();';
  echo '</script>';
  exit;
  # ----------
}