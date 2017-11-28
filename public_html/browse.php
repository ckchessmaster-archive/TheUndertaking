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
                        $genre = $_GET['genre'];
                        if (isset($_GET['genre']))
                        {
                            echo "<li><a href='index.php'>Home</a></li>";
                            echo "<li><a href='browse.php'>Browse Games</a></li>";
                            echo "<li>By Genre</li>";
                            echo "<li class='active'>$genre</li>";
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
                        <div class="result row">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="media/placeholder.svg" alt="{Game Image}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{Game Title}</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <p><a href="#" class="btn btn-primary btn-sm" role="button">View <i class="fa fa-angle-right" aria-hidden="true"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="result row">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="media/placeholder.svg" alt="{Game Image}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{Game Title}</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <p><a href="#" class="btn btn-primary btn-sm" role="button">View <i class="fa fa-angle-right" aria-hidden="true"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="result row">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="media/placeholder.svg" alt="{Game Image}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{Game Title}</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <p><a href="#" class="btn btn-primary btn-sm" role="button">View <i class="fa fa-angle-right" aria-hidden="true"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="result row">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="media/placeholder.svg" alt="{Game Image}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{Game Title}</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <p><a href="#" class="btn btn-primary btn-sm" role="button">View <i class="fa fa-angle-right" aria-hidden="true"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>


    </body>
</html>
