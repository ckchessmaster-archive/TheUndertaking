<?php
function getConnection() {
  $servername = "localhost";
  $username = "group2";
  $password = "fall2017776343";
  $dbname = "group2";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $conn;
}
?>
