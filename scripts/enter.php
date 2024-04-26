<?php

/* Получаем логин и пароль из формы входа */
/* session_start(); писать или нет в коде рабчем из интернета написано */ 
include('config.php');
$username= $_POST['login'];
$password= $_POST['password'];
if (isset($_POST['login']) && $username !== '') { // введеный логин не пуст
    // echo "<p> login is not null </p>";
    $table = "users";
        // здесь проверяем не пустым ли оказался ответный массив значений от БД
    $result = mysqli_query($link, "SELECT username, password FROM $table WHERE username = '$username';");
    $loginpassworddb = mysqli_fetch_array($result);
    $usernamedb = $loginpassworddb['username'];
    $passworddb = $loginpassworddb['password'];
    if ($usernamedb !== $username) {
        // echo "<p> the login is missing from the database </p>";
        // должны идти на страницу с "Не верный login, пожалуйста зарегестрируйтесь"
        ob_start();
        $loginerrorpage_url = '../enter_error/loginerrorpage.html';
        header('Location: '.$loginerrorpage_url);
        ob_end_flush();
        exit();
    } else {
            // echo "<p> password is not null </p>
            if ($password == $passworddb) { // при пустых данных мы авторизуемся
                // идем на главную страницу сайта                
                ob_start();
                $mainpage_url = '../mainpage.html';
                header('Location: '.$mainpage_url);
                ob_end_flush();
                exit();
            } else {
                // echo "<p> the password is incorrect </p>";
                // должны идти на страницу "Неверный пароль"
                ob_start();
                $passworderrorpage_url = '../enter_error/passworderrorpage.html';
                header('Location: '.$passworderrorpage_url);
                ob_end_flush();
                exit();
            }
    }
} else {
    // echo "<p> login is null </p>";
    // должны идти на страницу "Введите не пустые логин и пароль"
    ob_start();
    $loginerrorpage_url = '../enter_error/loginerrorpage.html';
    header('Location: '.$loginerrorpage_url);
    ob_end_flush();
    exit();
}



