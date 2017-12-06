<?php session_start();
require_once('../resources/dbManager.php'); ?>

<!DOCTYPE html>
<html lang="en">
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

    $stmt  = $conn->prepare("CALL GetGamesByTitle(?)");

    if (isset($_GET['searchKey'])) {
        $stmt->bindParam(1, $_GET['searchKey']);
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
                        <a href="game-details.php?gameID=<?php echo $row["GameID"] ?>">
                            <img class="media-object" src="media/game-images/<?php echo $row["Image"] ?>" alt="<?php echo $row["Title"] ?>">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $row["Title"]; ?></h4>
                        <p>
                            <?php
                            echo shortenDescription($row["Description"], 140);
                            ?>
                        </p>
                        <p><a href="game-details.php?gameID=<?php echo $row["GameID"] ?>" class="btn btn-success btn-sm" role="button">View <i class="fa fa-angle-right" aria-hidden="true"></i></a></p>
                    </div>
                </div>
            </div> <?php
        } else {
            continue;
        } // end if/else
    } // end foreach
} // end displayGames

function shortenDescription($text, $length) {
    if (strlen($text) > $length) {
        $text = substr($text, 0, strpos($text, ' ', $length));
        $text .= '...';
    }
    return $text;
}
?>
