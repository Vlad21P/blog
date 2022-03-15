<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <title>Посты</title>
    </head>
    <body>
        <?php require 'blocks/header.php'; ?>
        <div class="container mt-5">
            <?php 
            require 'identification/config.php';
            $sql2 = "SELECT COUNT(`id_posts`) FROM `posts`";
            $query = $mysqli->real_query($sql2);
            $c = 0;
            $result = $mysqli->store_result(0);
            while($count = $result->fetch_array(MYSQLI_NUM) and $c < $count[$c]):
                $sql2 = "SELECT * FROM `posts`";
                $mysqli->real_query($sql2); 
                $new_result = $mysqli->store_result($c);
                while($post = $new_result->fetch_assoc()):
            ?>   
            <div>
                </br>
                <h1 class="mb-5"><?php echo $post['post_name']; ?></h1>
                <i><?php echo $post['short_descr']; ?></i>
                <a name="post_<?php echo $post['id_posts'] ?>"></a>
                </br>
                <hr></hr>
                <p><?php echo $post['full_descr']; ?></p> 
            </div>
            <?php
                endwhile;
                $c++;
                endwhile;
                $result->close();
                $mysqli->close();
            require 'blocks/footer.php'; 
            ?>  
        </div>
    </body>
</html>