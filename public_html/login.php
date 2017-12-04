<?php session_start();
require_once('../resources/dbManager.php');

// We did not come to this page properly
if(!isset($_GET["func"])) {
  header('Location: index.php');
  exit();
}

// logout
if($_GET["func"] == "logout") {
  session_destroy();
  header('Location: login.php?function=login');
  exit();
} else {
  $_SESSION["loggedIn"] = true;
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="eng">
    <head>
        <?php include("shared/header.html"); ?>
    </head>
    <body>
        <?php include("shared/nav.php"); ?>
        <!-- Main content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 page">
                    <!-- Search header -->
                    <div class="page-header">
                    </div>
                    <!-- Results -->
                    <div class="results results-container container-fluid">
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </body>
</html>
