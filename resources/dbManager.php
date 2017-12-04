<?php
function getConnection() {
  $servername = "192.168.1.98";
  $username = "group2";
  $password = "dxgBDmvja45!";
  $dbname = "group2";
  $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $options);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $conn;
}
?>
