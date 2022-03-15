<?php
session_start();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$login = htmlspecialchars(trim($_POST['login']), ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML5);
$pass = htmlspecialchars(trim($_POST['pass']), ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML5);

require 'config.php';
try {
    $sqled_login = $mysqli->real_escape_string($login);
    $sqled_pass = $mysqli->real_escape_string($pass);
    $sql = "SELECT `pass`, `name` FROM `users` WHERE `login` = ?";
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($sql); 
    $stmt->bind_param('s', $sqled_login);
    $stmt->execute();
    $result = $stmt->get_result();
    while($column = $result->fetch_assoc()) {
        if (password_verify($sqled_pass, $column['pass'])) {
            $_SESSION['user_name'] = $column['name'];
            $_SESSION['user_login'] = $sqled_login;
        }
    }
    ob_end_flush();
    $result->free();
    $stmt->close();
    $mysqli->close();
    header('Location: ../index.php');
} catch (mysqli_sql_exception $e) {
        error_log($e->__toString());
}