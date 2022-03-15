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
        <title>Главная страница</title>
    </head>
    <body>
        <?php require 'blocks/header.php'; ?>
        <div class="container mt-5">
            <h3 class="mb-5">Краткое описание для постов</h3>
            <div class="d-flex flex-wrap">
                <?php
                require 'identification/config.php';
                $sql2 = "SELECT COUNT(`id_posts`) FROM `posts`";
                $query = $mysqli->real_query($sql2);
                $c = 0;
                $result = $mysqli->store_result(0);
                while($count = $result->fetch_array(MYSQLI_NUM) and $c < $count[$c]):
                    $sql2 = "SELECT `id_posts`, `post_name`, `short_descr` FROM `posts`";
                    $mysqli->real_query($sql2); 
                    $new_result = $mysqli->store_result($c);
                    while($post = $new_result->fetch_assoc()):
                    ?> 
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal"><?php echo $post['post_name']; ?></h4>
                        </div>
                        <div class="card-body">
                            <p><?php echo $post['short_descr']; ?></p>
                            <a class="btn btn-lg btn-block btn-outline-primary" 
                               href="posts.php#post_<?php echo $post['id_posts']; ?>">К посту</a>
                        </div>
                    </div>
                    <?php
                    endwhile;
                        $c++;
                endwhile;
                $result->close();
                $mysqli->close();
                    ?>
            </div>
        </div> 
        <?php require 'blocks/footer.php'; ?>  
    </body>
</html>


