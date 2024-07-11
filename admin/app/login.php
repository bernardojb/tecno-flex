<?php
# --------------------------------------------------
header("Content-Type: text/html; charset=utf-8", true);
# --------------------------------------------------
# Includes
# --------------------------------------------------
require_once '../lib/cfg.global.php';
# --------------------------------------------------
# Login check
# --------------------------------------------------
$username = (isset($_POST['username'])) ? $_POST['username'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
# --------------------------------------------------
$sql        = "SELECT * FROM users WHERE user_username = ?";
$arrayParam = array($username);
$data_user  = $crud_usr->getSQLGeneric($sql, $arrayParam, false);
# --------------------------------------------------
# Sessions
# --------------------------------------------------
if(!empty($data_user) && password_verify($password, $data_user->user_password))
{
  session_start();
  $_SESSION['user_id']       = $data_user->user_id;
  $_SESSION['user_username'] = $data_user->user_username;
  $_SESSION['user_name']     = $data_user->user_name;
  $_SESSION['user_role']     = $data_user->user_role;
  $_SESSION['user_logged']   = true;
  # --------------------------------------------------
  # Insert log
  # --------------------------------------------------
  date_default_timezone_set('America/Sao_Paulo');
  # ----------
  $arrayInsert = array(
    'log_user_id'       => $_SESSION['user_id'],
    'log_user_username' => $_SESSION['user_username'],
    'log_type'          => 'login',
    'log_ip'            => $_SERVER['REMOTE_ADDR'],
    'log_time'          => date("Y-m-d h:i:sa")
  );
  $return = $crud_log->insert($arrayInsert);
  # ----------
  echo '<script type="text/javascript">';
  echo 'alert("Login realizado com sucesso");';
  echo 'window.location.href="dashboard";';
  echo '</script>';
}
else
{
  session_start();
  $_SESSION = array();
  session_destroy();
  # ----------
  echo '<script type="text/javascript">';
  echo 'alert("Login não autorizado");';
  echo 'window.location.href="login-form";';
  echo '</script>';
  exit;
}