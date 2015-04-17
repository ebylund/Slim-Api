<?php

class DB {
  private $connection;
  private $dbHost = "127.0.0.1";
  private $dbName = 'cit_stuff';
  private $dbUser = 'root';
  private $dbPass = 'root';

  function __construct() {
    $this->connection = new PDO("mysql:host=$this->dbHost;dbname=$this->dbName", "$this->dbUser", "$this->dbPass");
  }

  function createStudent($student) {
    $sql = "INSERT INTO students(name, email, birthdate, age) VALUES (:name, :email, :birthdate, :age)";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam('name', $student['name']);
    $stmt->bindParam('email', $student['email']);
    $stmt->bindParam('birthdate', $student['birthdate']);
    $stmt->bindParam('age', $student['age']);
    $stmt->execute();
  }  
  
  function getStudents() {
    $sql = "SELECT * FROM students";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function getStudent($id) {
    $sql = "SELECT * FROM students WHERE id = :id";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam('id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
?>

<!-- CREATE TABLE `students` (`id` int(11) NOT NULL AUTO_INCREMENT,`name` varchar(255) NOT NULL,`email` varchar(255) DEFAULT NULL,`birthdate` date DEFAULT NULL,`age` int(11) DEFAULT NULL,PRIMARY KEY (`id`)) -->