<?php session_start(); ?> 
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <title>Контактная страница</title>
    </head>
    <body>
        <?php require 'blocks/header.php'; ?>
        <div class="container mt-5">
            <h3>Cвязаться:</h3></br>
            <form action="mailme/check.php" method="post">
                <input type="email" name="email" placeholder="Ваш email" class="form-control"></br>
                <textarea name="messege" placeholder="Ваше сообщение" class="form-control"></textarea></br>
                <button type="submit" name="send">Отправить</button>
            </form></br>
            <p>Ответ будет отправлен посредством электоронной почты</p></br>
            <hr>
            <h3>Позвонить</h3></br>
            <a href="tel:+375333219024">+375333219024</a>
        </div>
        <?php require 'blocks/footer.php'; ?>
    </body>
</html>

