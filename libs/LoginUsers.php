<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 28.05.2016
 * Time: 19:44
 */


use cl\ManageUsers;

//регистрация нового пользователя
if (isset($_POST['register'])) {
    session_start();
    $user = new ManageUsers();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $repassword = $_POST['repassword'];
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $date = date("Y-m-d");
    $time = date("H:i:s");


    if (empty($username) || empty($email) || empty($password) || empty($repassword)) {
        $error = "All fields are required";
    } elseif ($password !== $repassword) {
        $error = "Password does not match";
    } else {
        $checkAvailability = $user->getUserInfo($username);
        if ($checkAvailability == 0) {
            $password = md5($password);
            $registerUser = $user->registerUsers($username, $email, $password, $ipAddress, $time, $date);
            if ($registerUser == 1) {
                $makeSessions = $user->getUserInfo($username);
                foreach ($makeSessions as $userSession) {
                    $_SESSION['todoName'] = $userSession['username'];
                    if (isset($_SESSION['todoName'])) {
                        header('Location:index.php');
                    }
                }
            }
        } else {
            $error = "Username already exists";
        }
    }
}

if (isset($_POST['login'])) {
    session_start();
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];
    if (empty($username) || empty($password)) {
        $error = "All fields are required";
    } else {
        $password = md5($password);
        $loginUser = new ManageUsers();
        $authUser = $loginUser->loginUsers($username, $password);
        if ($authUser == 1) {
            $makeSessions = $loginUser->getUserInfo($username);
            foreach ($makeSessions as $userSession) {
                $_SESSION['todoName'] = $userSession['username'];
                if (isset($_SESSION['todoName'])) {
                    header('Location:index.php');
                }
            }

        } else {
            $error = "Invalid login or password";
        }
    }
}