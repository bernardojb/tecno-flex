<?php

# --------------------------------------------------
# Connection variables
# --------------------------------------------------
define('HOSTSEO',     'ubikabrasil.com.br');
define('DBNAMESEO',   'bloominseo_tecnoflex');
define('CHARSETSEO',  'utf8');
define('USERSEO',     'bloominseo_tecnoflex');#admacv_usrdb
define('PASSWORDSEO', 'bloomin102030');#v3PTfcdx
// define('HOST',     'localhost');
// define('DBNAME',   'adm_seo');
// define('CHARSET',  'utf8');
// define('USER',     'root');#admacv_usrdb
// define('PASSWORD', '');#v3PTfcdx
# --------------------------------------------------
# Connection class
# --------------------------------------------------
class ConnectionSEO
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
        self::$pdo    = new PDO('mysql:host='.HOSTSEO.';dbname='.DBNAMESEO.';charset='.CHARSETSEO, USERSEO, PASSWORDSEO, $conn_options);
      }
      catch (PDOException $e)
      {
        echo 'Erro: '.$e->getMessage();
      }
    }
    return self::$pdo;
  }
}