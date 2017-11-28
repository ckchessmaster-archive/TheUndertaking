<!DOCTYPE html>
<html lang="eng">
    <head>
        <?php include("shared/header.html"); ?>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Navbar, collapsed -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php" class="navbar-brand"><i id="logo" class="fa fa-gamepad fa-lg"></i> The Undertaking</a>
                </div>
                <!-- Navbar -->
                <div id="navbar" class="navbar-collapse collapse">
                    <!-- Left alignment -->
                    <ul class="nav navbar-nav">
                        <form class="navbar-form navbar-left" role="search">
                            <div class="input-group">
                                <input type="text" class="rounded form-control" placeholder="Search by title">
                                <span class="input-group-btn">
                                    <button class="btn btn-default rounded" type="submit">
                                        <i class="fa fa-adn fa-lg"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </ul>
                    <!-- Right alignment -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Browse Games <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="browse.php">View All</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">By Genre</li>
                                <li><a href="browse.php?genre=Action">Action</a></li>
                                <li><a href="browse.php?genre=Adventure">Adventure</a></li>
                                <li><a href="browse.php?genre=Casual">Casual</a></li>
                                <li><a href="browse.php?genre=Indie">Indie</a></li>
                                <li><a href="browse.php?genre=MMO">MMO</a></li>
                                <li><a href="browse.php?genre=Racing">Racing</a></li>
                                <li><a href="browse.php?genre=RPG">RPG</a></li>
                                <li><a href="browse.php?genre=Simulation">Simulation</a></li>
                                <li><a href="browse.php?genre=Sports">Sports</a></li>
                            </ul>
                        </li>
                        <li><a href="new-releases.php">New Releases</a></li>
                        <button type="button" class="btn btn-primary navbar-btn">Log In</button>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main content -->
        <div class="container-fluid">
            <!-- Carousel header -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="page-header">
                        <h3>Featured Games</h3>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <!-- Carousel -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="button" class="slick-prev">Previous</button>
                    <div class="carousel carousel-container">
                        <div class="carousel-content">
                            <div class="carousel-slide"><img src="media/featured1.jpg"></div>
                            <div class="carousel-slide"><img src="media/featured2.jpg"></div>
                            <div class="carousel-slide"><img src="media/featured3.jpg"></div>
                        </div>
                    </div>
                    <button type="button" class="slick-next"></button>
                </div>
                <div class="col-md-3"></div>
            </div>
            <!-- Website description header -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="page-header">
                        <h3>What is the Undertaking?</h3>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <!-- Website description -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <p>The Undertaking is Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

        <!-- JavaScript -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>
