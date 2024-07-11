<?php

# --------------------------------------------------
header("Content-Type: text/html; charset=utf-8", true);
# --------------------------------------------------
# Page protection
# --------------------------------------------------
require_once '../lib/class.check.php';
# --------------------------------------------------
# Includes
# --------------------------------------------------
require_once '../lib/cfg.global.php';
# --------------------------------------------------
# Passwords check
# --------------------------------------------------
$curr_password = (isset($_POST['curr_password'])) ? $_POST['curr_password'] : '';
$new_password  = (isset($_POST['new_password']))  ? $_POST['new_password']  : '';
$conf_password = (isset($_POST['conf_password'])) ? $_POST['conf_password'] : '';
# --------------------------------------------------
$sql        = "SELECT * FROM users WHERE user_id = ?";
$arrayParam = array($_SESSION['user_id']);
$data_user  = $crud_usr->getSQLGeneric($sql, $arrayParam, false);
# --------------------------------------------------
# Password change
# --------------------------------------------------
if(!empty($data_user) && password_verify($curr_password, $data_user->user_password) && $curr_password <> $new_password && $new_password == $conf_password)
{
  $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
  # ----------
  $arrayUpdate = array(
    'user_password' => $password_hash
  );
  $arrayCond = array('user_id=' => $_SESSION['user_id']);
  $return    = $crud_usr->update($arrayUpdate, $arrayCond);
  # ----------
  echo '<script type="text/javascript">';
  echo 'alert("Senha modificada com sucesso");';
  echo 'window.location.href="perfil";';
  echo '</script>';
}
else
{
  echo '<script type="text/javascript">';
  echo 'alert("Senhas não preenchidas corretamente");';
  echo 'window.location.href="perfil";';
  echo '</script>';
  exit;
}