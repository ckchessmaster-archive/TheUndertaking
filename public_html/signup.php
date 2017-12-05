<?php session_start();
require_once('../resources/dbManager.php');

if (isset($_GET["func"]) && $_GET["func"] == "create") {
    // make sure all of the values are here
    if (isset($_GET["username"]) && isset($_GET["password"]) && isset($_GET["firstName"]) && isset($_GET["lastName"]) && isset($_GET["email"])) {
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
        <script>
            // Globals
            var validUsername = false;
            var validPasswordConfirm = false;

            function checkUsername() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4) {
                        if (xhttp.responseText == "false") {
                            $("#usernameCheck").html('<div id="usernameCheck" class="text-danger">Username Taken!</div>');
                            validUsername = false;
                        } else {
                            $("#usernameCheck").html('<div id="usernameCheck" class="text-success">Username Available!</div>');
                            validUsername = true;
                        }
                        console.log(xhttp.responseText);
                    }
                };

                xhttp.open("GET", "AJAX.php?func=validateUsername&username=" + $("#inputUsername").val());
                xhttp.send();
            } // end checkUsername

            function checkPasswordConfirm() {
                if($('#inputPassword').val() == $('#inputPasswordConfirm').val()) {
                    $("#passwordConfirmCheck").html('<div id="usernameCheck" class="text-success">Success!</div>');
                    validPasswordConfirm = true;
                } else {
                    $("#passwordConfirmCheck").html('<div id="usernameCheck" class="text-danger">Passwords do not match!</div>');
                    validPasswordConfirm = false;
                }
            } // end checkPasswordConfirm

            function validateForm() {
                if(validUsername == true && validPasswordConfirm == true) {
                    return true;
                }

                return false;
            }
        </script>
    </head>
    <body>
        <?php include("shared/nav.php"); ?>
        <!-- Main content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 page">
                    <form action="signup.php">
                        <input type="hidden" name="func" id="func" value="create"/>
                        <!-- "Sign Up" header -->
                        <div class="page-header">
                            <h1>Sign Up</h1>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword">First Name</label>
                            <input type="password" class="form-control" name="firstName" id="inputFirstName" placeholder="Bob" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword">Last Name</label>
                            <input type="password" class="form-control" name="lastName" id="inputLastName" placeholder="Ross" />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputUsername">Email</label>
                            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="happylittletrees@gmail.com" />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputUsername">Username</label>
                            <input type="text" class="form-control" name="username" id="inputUsername" onchange="checkUsername()" onkeyup="checkUsername()" placeholder="Username" />
                            <div id="usernameCheck"></div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword">Confirm Password</label>
                            <input type="password" class="form-control" name="passwordConfirm" onchange="checkPasswordConfirm()" onkeyup="checkPasswordConfirm()" id="inputPasswordConfirm" placeholder="Password" />
                            <div id="passwordConfirmCheck"></div>
                        </div>
                        <div class="col-md-12"><button type="submit" class="btn btn-success">Create My Account</button></div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </body>
</html>

<?php
function createUser($username, $password, $firstName, $lastName, $email) {
    // make sure user isn't bypassing username check
    if (validateUsername($username)) {
        // create new user
        $conn = getConnection();
        $stmt  = $conn->prepare("CALL CreateUser(?, ?, ?, ?, ?)");

        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, password_hash($password, PASSWORD_DEFAULT));
        $stmt->bindParam(3, $firstName);
        $stmt->bindParam(4, $lastName);
        $stmt->bindParam(5, $email);

        $stmt->execute();
    }
}

function validateUsername($username) {
    $conn = getConnection();
    $stmt  = $conn->prepare("SELECT UserID FROM User WHERE Username LIKE ?");
    $stmt->bindParam(1, $username);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        return true;
    }

    return false;
}
?>
