<?php session_start();
require_once('../resources/dbManager.php'); ?>

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
                    <!-- "Browse Games" header -->
                    <div class="page-header">
                        <h3>Browse Games</h3>
                    </div>
                    <!-- Breadcrumbs -->
                    <ol class="breadcrumb">
                        <?php
                        if (isset($_GET['genre']))
                        {
                            echo "<li><a href='index.php'>Home</a></li>";
                            echo "<li><a href='browse.php'>Browse Games</a></li>";
                            echo "<li>By Genre</li>";
                            echo "<li class='active'>" . $_GET['genre'] . "</li>";
                        }
                        else
                        {
                            echo "<li><a href='index.php'>Home</a></li>";
                            echo "<li><a href='browse.php'>Browse Games</a></li>";
                            echo "<li class='active'>All</li>";
                        }
                        ?>
                    </ol>
                    <!-- Results -->
                    <div class="results results-container container-fluid">
                        <?php displayGames(); ?>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </body>
</html>

<?php
function displayGames() {
    $conn = getConnection();

    $stmt  = $conn->prepare("CALL GetGamesByGenre(?)");
    if(isset($_GET['genre'])) {
      $stmt->bindParam(1, $_GET["genre"]);
    } else {
      $stmt->bindValue(1, '%%');
    }
    $stmt->execute();

    $dupeCheck = array();
    foreach($stmt as $row) {
      // Don't display duplicate rows
      if(!isset($dupeCheck[$row["GameID"]])) {
        $dupeCheck[$row["GameID"]] = 1;
      ?>
      <div class="result row">
          <div class="media">
              <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="media/placeholder.svg" alt="{Game Image}">
                  </a>
              </div>
              <div class="media-body">
                  <h4 class="media-heading"><?php echo $row["Title"]; ?></h4>
                  <p><?php echo $row["Description"]; ?></p>
                  <p><a href="game-details.php?gameID=<?php echo $row["GameID"] ?>" class="btn btn-primary btn-sm" role="button">View <i class="fa fa-angle-right" aria-hidden="true"></i></a></p>
              </div>
          </div>
      </div> <?php
    } else {
      continue;
    } // end if/else
  } // end foreach
} // end displayGames
?>