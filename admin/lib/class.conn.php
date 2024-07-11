<?php
include_once('config.php');

# --------------------------------------------------
# Connection class
# --------------------------------------------------
class Connection
{
  private static $pdo;             # PDO instance
  private function __construct(){} # Hiding class constructor
  # --------------------------------------------------
  # Create connection
  # --------------------------------------------------
  public static function getInstance()
  {
    if(!isset(self::$pdo))
    {
      try
      {
        $conn_options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => true);
        self::$pdo    = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset='.CHARSET, USER, PASSWORD, $conn_options);
      }
      catch (PDOException $e)
      {
        echo 'Erro: '.$e->getMessage();
      }
    }
    return self::$pdo;
  }
}