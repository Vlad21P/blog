<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

if(isset($_POST)) {
    if(mb_strlen($_POST['login']) < 5 || mb_strlen($_POST['login']) > 50) {
        echo 'Недопустимая длина логина';
        exit();
    } else if(mb_strlen($_POST['name']) < 2 || mb_strlen($_POST['name']) > 50) {
        echo 'Недопустимая длина имени';
        exit();
    } else if(mb_strlen($_POST['pass']) < 5 || mb_strlen($_POST['pass']) > 20) {
        echo 'Недопустимая длина пароля';
        exit();
    } else {
        $login = htmlspecialchars(trim($_POST['login']), ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML5);
        $pass = htmlspecialchars(trim($_POST['pass']), ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML5);
        $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML5);
    }
    require 'config.php';
    try {
        $sqled_login = $mysqli->real_escape_string($login);
        $sqled_pass = $mysqli->real_escape_string(password_hash($pass, PASSWORD_ARGON2I));
        $sqled_name = $mysqli->real_escape_string($name);
        $query = "INSERT INTO `users` (`login`, `pass`, `name`) VALUES (?,?,?)";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('sss', $sqled_login, $sqled_pass, $sqled_name);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
        header('Location: ../auth.php');
    } catch (mysqli_sql_exception $e) {
        error_log($e->__toString());
    }
} 
