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
                    <!-- Search header -->
                    <div class="page-header">
                        <h3>Search by title: "<?php echo $_GET['searchKey'] ?>"</h3>
                    </div>
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

    $stmt  = $conn->prepare("CALL GetGameByTitle(?)");

    if (isset($_GET['searchKey'])) {
        $stmt->bindParam(1, $_GET['searchKey']);
        echo "it worked";
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