<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
if($_POST['del_pro'] == 'ok') {
    require 'config.php';
    try {
        $query = "DELETE FROM `users` WHERE `login` = ? AND `name` = ?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('ss', $_SESSION['user_login'], $_SESSION['user_name']);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
        session_unset();
        session_destroy();
        header('Location: ../index.php');
    } catch (mysqli_sql_exception $e) {
        error_log($e->__toString());
    }
} 

