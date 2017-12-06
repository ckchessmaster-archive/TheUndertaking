<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <!-- CSS -->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">

      <?php include("shared/header.html"); ?>

      <!-- JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
      <script src="js/script.js"></script>
    </head>
    <body>
        <?php include("shared/nav.php"); ?>
        <!-- Main content -->
        <div class="container-fluid">
            <!-- Carousel header -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 page">
                    <div class="page-header">
                        <h3>Featured Games</h3>
                    </div>
                    <!-- Carousel -->
                    <div class="carousel carousel-container">
                        <div class="carousel-content">
                            <div class="carousel-slide"><a href="game-details.php?gameID=9"><img src="media/featured1.jpg" alt="Featured Image 1"></a></div>
                            <div class="carousel-slide"><a href="game-details.php?gameID=1"><img src="media/featured2.jpg" alt="Featured Image 2"></a></div>
                            <div class="carousel-slide"><a href="game-details.php?gameID=15"><img src="media/featured3.jpg" alt="Featured Image 3"></a></div>
                        </div>
                    </div>
                    <!-- Website description header -->
                    <div class="page-header">
                        <h3>What is the Undertaking?</h3>
                    </div>
                    <!-- Website description -->
                    <p>The Undertaking is an online video game database of information related to video games. The Website enables registered users to login and search, rank, post comments and even view both up-coming and released video games trailers. The site has wide selection through which users may browse different games by genre and may also choose to be part of our active  gaming community.</p>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </body>
</html>
