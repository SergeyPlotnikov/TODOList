<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 31.05.2016
 * Time: 21:36
 */
session_start();
if (isset($_SESSION['todoName'])) {
    session_destroy();
    header('Location:login.php');
}