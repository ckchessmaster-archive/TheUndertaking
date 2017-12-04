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
                <form class="navbar-form navbar-left" role="search" method="get" action="search.php">
                    <div class="input-group">
                        <input type="text" class="rounded form-control" placeholder="Search by title" name="searchKey" id="searchKey">
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
                        <li><a href="browse.php?genre=FPS">FPS</a></li>
                        <li><a href="browse.php?genre=Indie">Indie</a></li>
                        <li><a href="browse.php?genre=MMO">MMO</a></li>
                        <li><a href="browse.php?genre=Racing">Racing</a></li>
                        <li><a href="browse.php?genre=RPG">RPG</a></li>
                        <li><a href="browse.php?genre=Simulation">Simulation</a></li>
                        <li><a href="browse.php?genre=Sports">Sports</a></li>
                        <li><a href="browse.php?genre=Stealth">Stealth</a></li>
                        <li><a href="browse.php?genre=Strategy">Strategy</a></li>
                    </ul>
                </li>
                <li><a href="new-releases.php">New Releases</a></li>
                <button type="button" class="btn btn-success navbar-btn">Log In</button>
            </ul>
        </div>
    </div>
</nav>