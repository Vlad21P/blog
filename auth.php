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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
          $("#dlt").click(function(){
            $("form#form").fadeToggle("slow");
          });
        });
        </script>
        <title>Личный кабинет</title>
    </head>
    <body>
        <?php if(isset($_SESSION['user_login'])): 
        require 'blocks/header.php'; ?>
        <div class="container mt-4">
            <h1>Личный кабинет пользователя <i><?php echo $_SESSION['user_login']; ?></i></h1>
            <p>Вам доступно:</p>
            <ul>
                <li><a href="add.php">Добавление постов</a></li>
                <li><a href="identification/exit.php">Выход</a></li>
                <li><a href="#form" id="dlt">Удаление профиля</a></li>
            </ul>
            <form action="identification/delete.php" method="post" id="form" style="display:none; color:red;">
                <input type="radio" id="html" name="del_pro" value="ok" required>
                <label for="html">Вы действительно хотите удалить профиль?</label><br>
                <button type="submit" name="send">Удалить</button>
            </form>
        </div>
        <?php require 'blocks/footer.php'; 
        else: ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <h1>Форма регистрации</h1></br>
                    <form action="identification/check_reg.php" method="post">
                        <input id="login" type="text" name="login" placeholder="Ваш логин" class="form-control" required></br>
                        <input id="name" type="text" name="name" placeholder="Ваше имя" class="form-control" required></br>
                        <input id="pass" type="password" name="pass" placeholder="Ваш пароль" class="form-control" required></br>
                        <button type="submit" name="send">Отправить</button>
                    </form>
                </div>
                <div class="col">
                    <h1>Форма входа</h1></br>
                    <form action="identification/check_auth.php" method="post">
                        <input id="login2" type="text" name="login" placeholder="Ваш логин" class="form-control" required></br>
                        <input id="pass2" type="password" name="pass" placeholder="Ваш пароль" class="form-control" required></br>
                        <button type="submit" name="send">Войти</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </body>
</html>

