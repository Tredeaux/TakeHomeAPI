<?php

  class Database{
    //Database Variables
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "API_DB";
    private $conn;

    //Database Connect
    public function connect() {
      $this->conn = null;

      try {
        $this->conn = new PDO('mysql:host='.$this->servername.';dbname='.$this->dbname,
        $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $error) {
        echo 'Connection Error: '. $error->getMessage();
      }
      return $this->conn;
    }

    //Database Connect
    public function create() {
      $this->conn = null;

      try {
        $this->conn = new PDO('mysql:host='.$this->servername,
        $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE API_DB";
        $this->conn->exec($sql);
        try {
          $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", 
          $this->username, $this->password);
          // set the PDO error mode to exception
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
          // sql to create table
          $sql = "CREATE TABLE clients (
          id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          idNumber VARCHAR(13) NOT NULL,
          name VARCHAR(30) NOT NULL,
          surname VARCHAR(30) NOT NULL,
          contactPrimary VARCHAR(10) NOT NULL,
          contactSecondary VARCHAR(10),
          emailAddress VARCHAR(50),
          gender varchar(6),
          language VARCHAR(30) NOT NULL,
          dead DATETIME,
          organisation VARCHAR(255) NOT NULL,
          creationDate DATETIME DEFAULT CURRENT_TIMESTAMP
          )";
        
          // use exec() because no results are returned
          $this->conn->exec($sql);
          echo "Table clients created successfully";
        } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
      } catch(PDOException $error) {
        echo 'Connection Error: '. $error->getMessage();
      }
      return $this->conn;
    }

  }

?>