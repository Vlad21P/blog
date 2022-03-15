<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST)) {
    $post_name = htmlspecialchars(trim($_POST['post_name']), ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML5);
    $short_descr = htmlspecialchars(trim($_POST['short_descr']), ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML5);
    $full_descr = htmlspecialchars(trim($_POST['full_descr']), ENT_QUOTES|ENT_SUBSTITUTE|ENT_HTML5);

    if(mb_strlen($post_name) < 5 || mb_strlen($post_name) > 100) {
        echo 'Недопустимая длина имени поста';
        exit();
    }
    if(mb_strlen($short_descr) < 50 || mb_strlen($short_descr) > 255) {
        echo 'Недопустимая длина краткого описания';
        exit();
    }
    if(mb_strlen($full_descr) < 200 || mb_strlen($full_descr) > 2000) {
        echo 'Недопустимая длина содержания';
        exit();
    }

    require '../config.php';
    try {
        $sqled1 = $mysqli->real_escape_string($post_name);
        $sqled2 = $mysqli->real_escape_string($short_descr);
        $sqled3 = $mysqli->real_escape_string($full_descr);
        $query = "INSERT INTO `posts` (`post_name`, `short_descr`, `full_descr`) VALUES(?,?,?)";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('sss', $sqled1, $sqled2, $sqled3);
        $stmt->execute();
        $mysqli->close();
        header('Location: ../../index.php');
    } catch (mysqli_sql_exception $e) {
        error_log($e->__toString());
    }
}

