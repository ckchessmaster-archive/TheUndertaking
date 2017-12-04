<?php
require_once('../resources/dbManager.php');

if(isset($_GET["func"]))  {
  switch($_GET["func"]) {
    case "validateUsername":
      if(isset($_GET["username"])) {
        echo validateUsername($_GET["username"]) ? 'true' : 'false';
      }
      break;
  }
}

function validateUsername($username) {
  $conn = getConnection();
  $stmt  = $conn->prepare("SELECT UserID FROM User WHERE Username LIKE ?");
  $stmt->bindParam(1, $username);
  $stmt->execute();

  if($stmt->rowCount() == 0) {
    return true;
  }

  return false;
}
?>
