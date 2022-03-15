<?php

$email = $_POST['email'];
$messege = $_POST['messege'];
$error = '';

if(trim($email) == '') {
   $error = 'Введите ваш email';
} else if(trim($messege) == '') {
   $error = 'Введите вашe сообщение';
} else if(strlen($messege) == '') {
   $error = 'Сообщение должно содержать более 10 символов';
}

if($error != '') {
    echo $error;
    exit();
}

$subject = "=?utf-8?B?".base64_encode('Тестовое сообщение')."?=";
$headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html;"
        . "charset=utf-8\r\n";
mail('vlad.prokopovich.01@bk.ru', $subject, $messege, $headers);
header('Location: ../contact.php');