<?php session_start();
require_once('../resources/dbManager.php');

//Go home if we entered this page by mistake
if (!isset($_GET["gameID"])) {
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
        <div class="container-fluid">
            <?php displayGame(); ?>
            <br>
            <!-- Comment section -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form>
                        <h3>Leave a Comment</h3>
                        <?php
                            // if not logged in
                            echo "<p>Not currently logged in. <a href='#'>Log in?</a></p>";
                        ?>
                        <textarea id="comment-box"></textarea>
                        <button type="button" class="btn btn-primary navbar-btn">Post Comment</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <ul class="comment-list">
                        <li class="comment">
                            <div class="comment-image">
                                <img src="media/avatar.svg"/>
                            </div>
                            <div class="comment-username">
                                <h5>{Username}</h5>
                            </div>
                            <div class="comment-text">
                                <p>This is a fake comment.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </body>
</html>

<?php
function displayGame() {
  $conn = getConnection();

  $stmt  = $conn->prepare("CALL GetGameByID(?)");
  $stmt->bindParam(1, $_GET["gameID"]);
  $stmt->execute();
  $result = $stmt->fetchAll(); ?>
  <!-- Game title header -->
  <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
          <div class="page-header">
              <h3><?php echo $result[0]["Title"]; ?></h3>
          </div>
      </div>
      <div class="col-md-3"></div>
  </div>
  <!-- Game description -->
  <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
          <p><?php echo $result[0]["Description"]; ?></p>
      </div>
      <div class="col-md-3"></div>
  </div>
  <!-- Game details -->
  <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
          <div class="esrb-rating">
              <img src="media/esrb-ratings/<?php echo $result[0]["Image"]; ?>" alt="<?php echo $result[0]["RatingFull"]; ?>"/>
          </div>
          <div id="game-highlights">
              <span><strong>Rating: </strong><?php echo $result[0]["RatingFull"]; ?></span>
              <span><strong>Developer: </strong><?php echo $result[0]["Developer"]; ?></span>
              <span><strong>Publisher: </strong><?php echo $result[0]["Publisher"]; ?></span>
              <span><strong>Release date: </strong><?php echo $result[0]["ReleaseDate"]; ?></span>
              <span>
                <strong>Genre(s): </strong>
                <?php $index = 0;
                foreach($result as $row) {
                  echo '<a href=browse.php?genre=' . $result[$index]["Genre"] . ' class="badge badge-Info">' .$result[$index]["Genre"] ."</a> ";
                  $index += 1;
                } ?>
              </span>
          </div>
          <div class="page-header"></div>
          <div><iframe class="trailer" width="640px" height="360px" src="<?php echo $result[0]["Trailer"]; ?>"></iframe></div>
      </div>
      <div class="col-md-3"></div>
  </div> <?php
}
?>
