<?php

//$driver = new mysqli_driver();
//$driver->report_mode = MYSQLI_REPORT_ALL;

$host = 'localhost';
$user_name = 'root';
$user_pass = '';
$db_name = 'blog';

$mysqli = new mysqli($host, $user_name, $user_pass, $db_name);
if ($mysqli->connect_errno) {
    die('Ошибка подключения: '. $mysqli->connect_error);
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);



