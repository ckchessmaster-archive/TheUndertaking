<!DOCTYPE html>
<html lang="eng">
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
                            <div class="carousel-slide"><img src="media/featured1.jpg"></div>
                            <div class="carousel-slide"><img src="media/featured2.jpg"></div>
                            <div class="carousel-slide"><img src="media/featured3.jpg"></div>
                        </div>
                    </div>
                    <!-- Website description header -->
                    <div class="page-header">
                        <h3>What is the Undertaking?</h3>
                    </div>
                    <!-- Website description -->
                    <p>The Undertaking is Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </body>
</html>
