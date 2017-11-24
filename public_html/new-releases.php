<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Undertaking</title>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <!-- Navbar, collapsed -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-brand"><i class="fa fa-gamepad fa-lg"></i></span>
                    <a class="navbar-brand" href="index.php">The Undertaking</a>
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
                        <button type="button" class="btn btn-default navbar-btn">Log In</button>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main content -->
        <div class="container-fluid">
            <!-- "New Releases" header -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="page-header">
                        <h3>New Releases</h3>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <!-- Breadcrumbs -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='browse.php'>Browse Games</a></li>
                        <li class='active'>New Releases</li>
                    </ol>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

        <!-- JavaScript -->
        <script src="../resources/lib/jquery-3.2.1.min.js"></script>
        <script src="../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>