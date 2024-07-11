<?php
require('config.php');
# ----------------------------------------
session_start();
# ----------------------------------------
if(!isset($_SESSION['user_logged']) || empty($_SESSION['user_logged']) || $_SESSION['user_logged'] <> true)
{
  header("location:login-form");
  exit();
}