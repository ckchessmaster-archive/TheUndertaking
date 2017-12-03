<!DOCTYPE html>
<html lang="eng">
    <head>
        <?php include("shared/header.html"); ?>
    </head>
    <body>
        <?php include("shared/nav.php"); ?>
        <div class="container-fluid">
            <!-- Game title header -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="page-header">
                        <h3><?php $_GET['title']?>{Title}</h3>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <!-- Game description -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-md-3"></div>
            </div>
            <!-- Game details -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="esrb-rating">
                        <img src="media/esrb-ratings/rating-pending.svg" alt="<?php $_GET['RatingFull']?>"/>
                    </div>
                    <div id="game-highlights">
                        <span><strong>Rating: </strong><?php $_GET['ratingFull']?>{RatingFull}</span>
                        <span><strong>Developer: </strong><?php $_GET['developer']?>{DeveloperName}</span>
                        <span><strong>Publisher: </strong><?php $_GET['publisher']?>{PublisherName}</span>
                        <span><strong>Release date: </strong><?php $_GET['releaseDate']?>{ReleaseDate}</span>
                        <span><strong>Genre(s): </strong><?php $_GET['genre']?>{Genre(s)}</span>
                    </div>
                    <div class="page-header"></div>
                    <div><iframe class="trailer" width="640px" height="360px" src="https://www.youtube.com/embed/"></iframe></div>
                </div>
                <div class="col-md-3"></div>
            </div>
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