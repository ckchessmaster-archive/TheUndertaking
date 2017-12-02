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
            <!-- "Browse Games" header -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="page-header">
                        <h3>Browse Games</h3>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <!-- Breadcrumbs -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
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
                </div>
                <div class="col-md-3"></div>
            </div>

            <!-- Results -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
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
    // $conn = getConnection();
    //
    // $stmt  = $conn->prepare("CALL GetGamesByGenre(':genre')");
    //
    // if(isset($_GET['genre'])) {
    //   $stmt->bindValue(':genre', $_GET["genre"]);
    // } else {
    //   $stmt->bindValue(':genre', '%%');
    // }
    // $stmt->execute();
    // //$result = $stmt->fetchAll();
    //
    // $conn = NULL;

    $conn = getConnection();
    $sql = "CALL GetGamesByGenre('" . $_GET["genre"] . "')";
    $result = $conn->query($sql);

    foreach($result as $row) { ?>
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
                  <p><a href="#" class="btn btn-primary btn-sm" role="button">View <i class="fa fa-angle-right" aria-hidden="true"></i></a></p>
              </div>
          </div>
      </div>
<?php }
}
?>
