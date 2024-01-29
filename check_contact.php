<?php
    session_start();

    unset($_SESSION['user_name']);
    unset($_SESSION['email']);
    unset($_SESSION['subject']);
    unset($_SESSION['message']);

    unset($_SESSION['error_username']);
    unset($_SESSION['error_email']);
    unset($_SESSION['error_subject']);
    unset($_SESSION['error_message']);

function redirect()
    {
        header('Location: contacts.php');
        exit;
    }
    function redirect_m()
    {
        header('Location: main.php');
    }

    $user_name = htmlspecialchars(trim($_POST['username']));
    $from = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));


    $_SESSION['user_name'] = $user_name;
    $_SESSION['email'] = $from;
    $_SESSION['subject'] = $subject;
    $_SESSION['message'] = $message;
    $_SESSION['success_mail'] = "";

    $_SESSION['error_username'] = "";
    $_SESSION['error_email'] = "";
    $_SESSION['error_subject'] = "";
    $_SESSION['error_message'] = "";

if(strlen($user_name) <= 1){
        $_SESSION['error_username'] = "Введите корректное имя";
        redirect();
    } else if(strlen($from) < 5 || strpos($from, "@") == false){
        $_SESSION['error_email'] = "Вы ввели некорректный email";
        redirect();
    } else if(strlen($subject) <= 5){
        $_SESSION['error_subject'] = "Тема сообщения меньше 5 символов";
        redirect();
    } else if(strlen($message) <= 15){
        $_SESSION['error_message'] = "Сообщение меньше 15 символов";
        redirect();
    } else {
//        $subject = "=?utf-8?B?".base64_encode($subject)."?=";
//        $headers = "From: $from\r\nReply-to: $from\r\nContent-type:/plain; charset=utf-8\r\n";
//        mail("admin@admin.com", $subject, $message, $headers);
        $_SESSION['success_mail'] = "Вы успешно отправили письмо";
        redirect_m();
    }

//session_destroy();