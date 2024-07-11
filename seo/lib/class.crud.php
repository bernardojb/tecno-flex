<?php

# --------------------------------------------------
# Creating CRUD class
# --------------------------------------------------
class CrudSEO
{
  private $pdo         = null;    # Storing PDO connection
  private $table       = null;    # Storing table name
  private static $crud = array(); # Static attribute that contains a self instance
  # --------------------------------------------------
  # Class constructor -> PUBLIC method
  # --------------------------------------------------
  public function __construct($connection, $table='default')
  {
    if(!empty($connection))
    {
      $this->pdo = $connection;
    }
    else
    {
      echo 'Conexão inexistente!';
      exit();
    }
    # ----------
    if(!empty($table) && $table !== 'default')
    {
      $this->table =$table;
    }
  }
  # --------------------------------------------------
  # Static public method that returns a Crud class instance
  # --------------------------------------------------
  public static function getInstance($connection, $table='default')
  {
    # Verifying if there's a class instance
    if(!isset(self::$crud[$table]))
    {
      try
      {
        self::$crud[$table] = new CrudSEO($connection, $table);
      }
      catch (Exception $e)
      {
        echo 'Error '.$e->getMessage();
      }
    }
    return self::$crud[$table];
  }
  # --------------------------------------------------
  # Setting table name on $table
  # --------------------------------------------------
  public function setTableName($table)
  {
    if(!empty($table))
    {
      $this->table = $table;
    }
  }
  # --------------------------------------------------
  # SQL INSERT builder
  # --------------------------------------------------
  private function buildInsert($arrayData)
  {
    # Variables
    $sql    = '';
    $fields = '';
    $values = '';
    # Constructing instruction with loop
    foreach ($arrayData as $key => $value)
    {
      $fields .= $key.', ';
      $values .= '?, ';
    }
    # Removes comma from the end of the string
    $fields = (substr($fields, -2) == ', ') ? trim(substr($fields, 0, (strlen($fields) - 2))) : $fields;
    # Removes comma from the end of the string
    $values = (substr($values, -2) == ', ') ? trim(substr($values, 0, (strlen($values) - 2))) : $values;
    # Concatenating variables for instruction
    $sql .= "INSERT INTO {$this->table} (".$fields.")VALUES(".$values.")";
    # Returns string with SQL instruction
    return trim($sql);
  }
  # --------------------------------------------------
  # SQL UPDATE builder
  # --------------------------------------------------
  private function buildUpdate($arrayData, $arrayCondition)
  {
    # Variables
    $sql       = '';
    $fields    = '';
    $condition = '';
    # Constructing instruction with loop
    foreach ($arrayData as $key => $value)
    {
      $fields .= $key.'=?, ';
    }
    # Constructing WHERE condition with loop
    foreach ($arrayCondition as $key => $value)
    {
      $condition .= $key.'? AND ';
    }
    # Removes comma from the end of the string
    $fields = (substr($fields, -2) == ', ') ? trim(substr($fields, 0, (strlen($fields) - 2))) : $fields;
    # Removes comma from the end of the string
    $condition = (substr($condition, -4) == 'AND ') ? trim(substr($condition, 0, (strlen($condition) - 4))) : $condition;
    # Concatenating variables for instruction
    $sql .= "UPDATE {$this->table} SET ".$fields." WHERE ".$condition;
    # Returns string with SQL instruction
    return trim($sql);
  }
  # --------------------------------------------------
  # SQL DELETE builder
  # --------------------------------------------------
  private function buildDelete($arrayCondition)
  {
    # Variables
    $sql    = '';
    $fields = '';
    # Constructing instruction with loop
    foreach ($arrayCondition as $key => $value)
    {
      $fields .= $key.'? AND ';
    }
    # Removes AND from the end of the string
    $fields = (substr($fields, -4) == 'AND ') ? trim(substr($fields, 0, (strlen($fields) - 4))) : $fields;
    # Concatenating variables for instruction
    $sql .= "DELETE FROM {$this->table} WHERE ".$fields;
    # Returns string with SQL instruction
    return trim($sql);
  }
  # --------------------------------------------------
  # SQL INSERT function
  # --------------------------------------------------
  public function insert($arrayData)
  {
    try
    {
      # Insert SQL instruction built from method
      $sql = $this->buildInsert($arrayData);
      # Transfer instruction to PDO
      $stm = $this->pdo->prepare($sql);
      # Loop for data as parameter
      $count = 1;
      foreach ($arrayData as $value)
      {
        $stm->bindValue($count, $value);
        $count++;
      }
      # Execute SQL instruction and returns
      $result = $stm->execute();
      return $result;
    }
    catch (PDOException $e)
    {
      echo 'Error: '.$e->getMessage();
    }
  }
  # --------------------------------------------------
  # SQL UPDATE function
  # --------------------------------------------------
  public function update($arrayData, $arrayCondition)
  {
    try
    {
      # Insert SQL instruction built from method
      $sql = $this->buildUpdate($arrayData, $arrayCondition);
      # Transfer instruction to PDO
      $stm = $this->pdo->prepare($sql);
      # Loop for data as parameter
      $count = 1;
      foreach ($arrayData as $value)
      {
        $stm->bindValue($count, $value);
        $count++;
      }
      # Loop for data as parameter for WHERE clause
      foreach ($arrayCondition as $value)
      {
        $stm->bindValue($count, $value);
        $count++;
      };
      # Execute SQL instruction and returns
      $result = $stm->execute();
      return $result;
    }
    catch (PDOException $e)
    {
      echo 'Error: '.$e->getMessage();
    }
  }
  # --------------------------------------------------
  # SQL DELETE function
  # --------------------------------------------------
  public function delete($arrayCondition)
  {
    try
    {
      # Insert SQL instruction built from method
      $sql = $this->buildDelete($arrayCondition);
      # Transfer instruction to PDO
      $stm = $this->pdo->prepare($sql);
      # Loop for data as parameter for WHERE clause
      $count = 1;
      foreach ($arrayCondition as $value)
      {
        $stm->bindValue($count, $value);
        $count++;
      }
      # Execute SQL instruction and returns
      $result = $stm->execute();
      return $result;
    }
    catch (PDOException $e)
    {
      echo 'Error: '.$e->getMessage();
    }
  }
  # --------------------------------------------------
  # SQL SELECT(generic) function
  # --------------------------------------------------
  public function getSQLGeneric($sql, $arrayParams=null, $fetchAll=true)
  {
    try
    {
      # Transfer instruction to PDO
      $stm = $this->pdo->prepare($sql);
      # Check if there's conditions to load parameters
      if(!empty($arrayParams))
      {
        # Loop for data as parameter for WHERE clause
        $count = 1;
        foreach ($arrayParams as $value)
        {
          $stm->bindValue($count, $value);
          $count++;
        }
      }
      # Execute SQL instruction
      $stm->execute();
      # Verify if it's necessary to return more than one record
      if($fetchAll)
      {
        $data = $stm->fetchAll(PDO::FETCH_OBJ);
      }
      else
      {
        $data = $stm->fetch(PDO::FETCH_OBJ);
      }
      # Return
      return $data;
    }
    catch (PDOException $e)
    {
      echo "Error: ".$e->getMessage();
    }
  }
}