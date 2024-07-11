<?php

# --------------------------------------------------
header("Content-Type: text/html; charset=utf-8", true);
# --------------------------------------------------
# Includes
# --------------------------------------------------
require_once '../lib/cfg.global.php';
# --------------------------------------------------
session_start();
# --------------------------------------------------
date_default_timezone_set('America/Sao_Paulo');
# ----------
$arrayInsert = array(
  'log_user_id'       => $_SESSION['user_id'],
  'log_user_username' => $_SESSION['user_username'],
  'log_type'          => 'logout',
  'log_ip'            => $_SERVER['REMOTE_ADDR'],
  'log_time'          => date("Y-m-d h:i:sa")
);
$return = $crud_log->insert($arrayInsert);
# --------------------------------------------------
$_SESSION = array();
session_destroy();
# --------------------------------------------------
echo '<script type="text/javascript">';
echo 'alert("Sessão encerrada");';
echo 'window.location.href="login-form";';
echo '</script>';
exit;