<?php session_start();
require_once('../resources/dbManager.php');

// We did not come to this page properly
if(!isset($_GET["func"])) {
  header('Location: index.php');
  exit();
}

// logout
if($_GET["func"] == "logout") {
  session_destroy();
  header('Location: login.php?func=login');
  exit();
} else if($_GET["func"] == "validate" && isset($_GET["username"]) && isset($_GET["password"])) {
  if(validateLogin($_GET["username"], $_GET["password"])) {
    $_SESSION["loggedIn"] = true;
    header('Location: index.php');
    exit();
  } else {
    header('Location: login.php?func=login&validate=failed');
    exit();
  }
} ?>
<!DOCTYPE html>
<html lang="eng">
    <head>
        <?php include("shared/header.html"); ?>
    </head>
    <body>
        <?php include("shared/nav.php"); ?>
        <!-- Main content -->
        <div class="container-fluid">
          <div class="row">
            <div class= "col-md-3 page">
              <form action="login.php">
                <input type="hidden" name="func" id="func" value="validate"/>
                <div class="form-group">
                  <h1>Login</h1>
                  <div>Don't have an account?<a href="signup.php">Sign up here!</a></div>
                  <?php if(isset($_GET["validate"]) && $_GET["validate"] == "failed") { ?>
                    <div class="text-danger"> Invalid Username or Password!</div> <?php
                  } ?>
                  <label for="inputUsername">Username</label>
                  <input type="text" class="form-control" name="username" id="inputUsername" placeholder="Username" />
                </div>
                <div class="form-group">
                  <label for="inputPassword">Password</label>
                  <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" />
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <div><a href="#">Forgot password?</a></div>
              </form>
            </div>
          </div>
        </div>
    </body>
</html>

<?php
function validateLogin($username, $password) {
  $conn = getConnection();
  $stmt  = $conn->prepare("SELECT Username, Password FROM User WHERE Username LIKE ?");
  $stmt->bindParam(1, $username);
  $stmt->execute();
  $result = $stmt->fetchAll();

  // check if username was valid
  if($stmt->rowCount() > 0) {
    // validate password
    return(password_verify($password, $result[0]["Password"]));
  }

  return false;
} ?>
