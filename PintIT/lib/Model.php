<?php

  abstract class Model {

    protected $dbh;
    protected $stmt;

    public function __construct(){

      //Ceonnet to DB
      $this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    }

    //Pass query through this function to execute
    public function query($query){
  		$this->stmt = $this->dbh->prepare($query);
  	}

    //check query value types and bind param
    public function bind ($param, $value, $type = null) {

      if (is_null($type)) {
        switch (true) {
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
            break;
          default:
            $type = PDO::PARAM_STR;
        }
      }
      $this->stmt->bindValue($param, $value, $type);
    }

    public function Execute () {

      $this->stmt->Execute();
    }

    public function ResultSet () {
      $this->Execute();
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function LastinsertId () {

      return $this->dbh->LastInsertId();
    }
  }

?>
