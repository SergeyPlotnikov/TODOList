<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 28.05.2016
 * Time: 16:37
 */

include_once 'vendor/autoload.php';
include_once "libs/LoginUsers.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo Maker</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="jquery-1.12.1.js"></script>
    <script>
        $(function () {
            $('#show_register').click(function () {
                $('.login_form').hide();
                $('.register_form').show();
            });
            $('#show_login').click(function () {
                $('.login_form').show();
                $('.register_form').hide();
            });
        });
    </script>
</head>
<body>
<div id="mainWrapper">
    <nav class="navbar navbar-inverse">
        <div class="container">
            <a class="navbar-brand" href="#">
                Todo Maker
            </a>
        </div>
    </nav>
    <div id="content">
        <?php
        if (isset($error)) {
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        }
        ?>
        

        <div class="login_form">
            <div id="form">
                <h2>Login here</h2>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="loginUsername" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="loginPassword" id="password">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" id="login" class="btn btn-success">
                    </div>
                    <br>
                    <a id='show_register' href="#">Do not have an account?</a>
                </form>
            </div>
        </div>


        <!--Форма регистрации-->
        <div class="register_form">
            <div id="form">
                <h2>Register here</h2>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="repassword">Re-password</label>
                        <input type="password" class="form-control" name="repassword" id="repassword">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="register" id="register" class="btn btn-success">
                    </div>
                    <br>
                    <a id='show_login' href="#">Already have an account?</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
