<?php session_start();
require_once('../resources/dbManager.php');

if(isset($_GET["func"]) && $_GET["func"] == "create") {
  // make sure all of the values are here
  if(isset($_GET["username"]) && isset($_GET["password"]) && isset($_GET["firstName"]) && isset($_GET["lastName"]) && isset($_GET["email"])) {
    createUser($_GET["username"],$_GET["password"], $_GET["firstName"], $_GET["lastName"], $_GET["email"]);
    session_destroy();
    header('Location: login.php?func=login');
    exit();
  } else {
    header('Location: login.php?func=login');
    exit();
  }
}
?>

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
              <form action="signup.php">
                <input type="hidden" name="func" id="func" value="create"/>
                <h1>Create Account</h1>
                <div class="form-group">
                  <label for="inputUsername">Email</label>
                  <input type="email" class="form-control" name="email" id="inputEmail" placeholder="email@email.com" />
                </div>
                <div class="form-group">
                  <label for="inputUsername">Username</label>
                  <input type="text" class="form-control" name="username" id="inputUsername" placeholder="Username" />
                </div>
                <div class="form-group">
                  <label for="inputPassword">Password</label>
                  <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" />
                </div>
                <div class="form-group">
                  <label for="inputPassword">Confirm Password</label>
                  <input type="password" class="form-control" name="passwordConfirm" id="inputPasswordConfirm" placeholder="Password" />
                </div>
                <div class="form-group">
                  <label for="inputPassword">First Name</label>
                  <input type="password" class="form-control" name="firstName" id="inputFirstName" placeholder="Bob" />
                </div>
                <div class="form-group">
                  <label for="inputPassword">Last Name</label>
                  <input type="password" class="form-control" name="lastName" id="inputLastName" placeholder="Ross" />
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
              </form>
            </div>
          </div>
        </div>
    </body>
</html>

<?php
function createUser($username, $password, $firstName, $lastName, $email) {
  $conn = getConnection();
  $stmt  = $conn->prepare("CALL CreateUser(?, ?, ?, ?, ?)");

  $stmt->bindParam(1, $username);
  $stmt->bindParam(2, password_hash($password, PASSWORD_DEFAULT));
  $stmt->bindParam(3, $firstName);
  $stmt->bindParam(4, $lastName);
  $stmt->bindParam(5, $email);

  $stmt->execute();
} ?>
