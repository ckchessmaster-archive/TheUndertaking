<?php session_start();
require_once('../resources/dbManager.php');

// Go home if we entered this page by mistake
if (!isset($_GET["gameID"])) {
    header('Location: index.php');
    exit();
}

// Are we posting a comment?
if (isset($_GET["func"]) && $_GET["func"] == "post" && $_SESSION["loggedIn"] == true && isset($_GET["gameID"])) {
    postComment($_SESSION["username"], $_GET["gameID"], $_GET["comment"]);
    header('Location: game-details.php?gameID=' . $_GET["gameID"]);
    echo $_SESSION["username"];
    exit();
}
?>

<!DOCTYPE html>
<html lang="eng">
    <head>
        <?php include("shared/header.html"); ?>
        <script>
            function countChars() {
                var count = $('#comment-box').val().length;
                if (count >= 1920) {
                    $('#chars').html('<span id="chars" class="text-danger">' + count + '</span>');
                } else {
                    $('#chars').html('<span id="chars">' + count + '</span>');
                }
                console.log(count);
            }

            function validateForm() {
                return $('#comment-box').val().length <= 1920;
            }
        </script>
    </head>
    <body>
        <?php include("shared/nav.php"); ?>
        <div class="container-fluid">
            <?php displayGame($_GET["gameID"]); ?>
            <!-- Game highlights  -->
            <br>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 page">
                    <!-- Comment form -->
                    <form action="game-details.php" onsubmit="return validateForm()">
                        <h3>Leave a Comment</h3>
                        <?php
                        // Check if logged in
                        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) { ?>
                            <input type="hidden" name="func" id="func" value="post"/>
                            <input type="hidden" name="gameID" id="gameID" value="<?php echo $_GET["gameID"]; ?>"/>
                            <textarea name="comment" id="comment-box" onkeyup="countChars()" onchange="countChars()"></textarea>
                            <p>Characters: <span id="chars">0</span> / 1920</p>
                            <button type="submit" class="btn btn-success navbar-btn">Post Comment</button> <?php
                        } else { ?>
                            <p>Please log in to post. Don't have an account? <a href="signup.php">Sign up</a>.</p>
                            <a class="btn btn-success navbar-btn" href="login.php?func=login">Log In</a> <?php
                        } ?>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 page">
                    <!-- Comment section -->
                    <h3>Comments</h3>
                    <?php displayComments($_GET["gameID"]); ?>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </body>
</html>

<?php
function displayGame($gameID) {
    $conn = getConnection();

    $stmt  = $conn->prepare("CALL GetGameByID(?)");
    $stmt->bindParam(1, $gameID);
    $stmt->execute();
    $result = $stmt->fetchAll(); ?>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 page">
            <!-- Rating -->
            <?php ?>
            <div class="star-rating">
                <input type="checkbox" id="star1" value="1" />
                <label for="star1"></label>
                <input type="checkbox" id="star2" value="2" />
                <label for="star2"></label>
                <input type="checkbox" id="star3" value="3" />
                <label for="star3"></label>
                <input type="checkbox" id="star4" value="4" />
                <label for="star4"></label>
                <input type="checkbox" id="star5" value="5" />
                <label for="star5"></label>
            </div>
            <!-- Game title header -->
            <div class="page-header">
                <h3><?php echo $result[0]["Title"]; ?></h3>
            </div>
            <!-- Game description -->
            <p><?php echo $result[0]["Description"]; ?></p>
            <!-- Game ESRB rating -->
            <div class="esrb-rating">
                <img src="media/esrb-ratings/<?php echo $result[0]["Image"]; ?>" alt="<?php echo $result[0]["RatingFull"]; ?>"/>
            </div>
            <!-- Game highlights -->
            <div id="game-highlights">
                <span><strong>Rating: </strong><?php echo $result[0]["RatingFull"]; ?></span>
                <span><strong>Developer: </strong><?php echo $result[0]["Developer"]; ?></span>
                <span><strong>Publisher: </strong><?php echo $result[0]["Publisher"]; ?></span>
                <span><strong>Release date: </strong><?php echo $result[0]["ReleaseDate"]; ?></span>
                <span><strong>Genre(s): </strong>
                    <?php
                    $index = 0;
                    foreach($result as $row) {
                        echo '<a href=browse.php?genre=' . $result[$index]["Genre"] . ' class="badge badge-info">' .$result[$index]["Genre"] ."</a> ";
                        $index += 1;
                    } ?>
                </span>
            </div>
            <br>
            <div class="page-header"></div>
            <div class="video-container"><iframe width="640px" height="360px" src="<?php echo $result[0]["Trailer"]; ?>"></iframe></div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <?php
}

function displayComments($gameID) {
    $conn = getConnection();
    $stmt  = $conn->prepare("CALL GetPostsByGameID(?)");
    $stmt->bindParam(1, $_GET["gameID"]);
    $stmt->execute();
    $result = $stmt->fetchAll(); ?>

    <ul class="comment-list"> <?php
        foreach($result as $row) { ?>
            <li class="comment">
                <div class="comment-image">
                    <img src="media/avatar.svg"/>
                </div>
                <div class="comment-body">
                    <h5 class="comment-username"><?php echo $row["Username"] ?></h5>
                    <p><?php echo $row["Comment"] ?></p>
                    <span class="comment-subtext">on <?php echo $row["DatePosted"] ?></span>
                </div>
            </li> <?php
        } ?>
    </ul> <?php
}

function postComment($username, $gameID, $comment) {
    echo $username;
    $conn = getConnection();
    $stmt  = $conn->prepare("CALL CreatePost(?, ?, ?)");
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $gameID);
    $stmt->bindParam(3, $comment);
    $stmt->execute();
}
?>
