<?php session_start(); ?> 
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <title>Добавить пост</title>
    </head>
    <body>
        <?php require 'blocks/header.php'; ?>
        <div class="container mt-5">
            <h3 class="mb-5">Добавить пост</h3>
            <form action="identification/posts/addpost.php" method="post">
                <input id="post_name" maxlength="100" type="text" name="post_name" placeholder="Заголовок" class="form-control" required></br>
                <textarea required maxlength="255" name="short_descr" placeholder="Краткое описание" class="form-control" required></textarea></br>
                <textarea required maxlength="2000" name="full_descr" placeholder="Полное описание" class="form-control" required></textarea></br>
                <button type="submit" name="send">Отправить</button>
            </form></br>
        </div>
        <?php require 'blocks/footer.php'; ?>  
    </body>
</html>

