<?php

include('config.php');
$username = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeatpassword = $_POST['repeatpassword'];

// нужна ли проверка входящих данных на пустоту? Проверка реализована добавлением атрибута required к тегу input, тип text
// здесь может быть проверка входных данных на пустоту, на другие различные характеристики (к примеру если в поле email указана строка без @)
// здесь должна быть логика на проверку полей password и repeatpassword

if ($password == $repeatpassword) { // это условие точно работает верно
    
    $table = "users";
    // echo '<p>Неверный логин или пароль</p>';
    $loginquery = mysqli_query($link, "SELECT username, password FROM $table WHERE username = '$username';");
    $emailquery = mysqli_query($link, "SELECT username, password FROM $table WHERE email = '$email';");
    $loginquerydb = mysqli_fetch_array($loginquery);
    $emailquerydb = mysqli_fetch_array($emailquery);

    if (!empty($loginquerydb) || !empty($emailquerydb)) { // если хоть один из массивов не пуст, то регистрация невозможна. Проверяем в этом блоке какой из массивов не пуст: запроса логина или пароля

        if (!empty($loginquerydb)) {

            ob_start();
            $registrationloginerror_url = '../registration_error/loginerror.html';
            header('Location: '.$registrationloginerror_url);
            ob_end_flush();
            exit();

        } else {

            ob_start();
            $registrationmailerror_url = '../registration_error/mailerror.html';
            header('Location: '.$registrationmailerror_url);
            ob_end_flush();
            exit();

        }
    } else { // массивы пусты, нужно вносить данные в БД
        
        // в строках 46-48 нет необходимости, они написано исключительно по причине проблемы на строне домена с автоинкрементирующими полями в БД.
        // выполняет функцию автоинвкремента поля id

        $lastidquery = mysqli_query($link, "SELECT id FROM $table ORDER BY id DESC LIMIT 1;");
        $idarray = mysqli_fetch_array($lastidquery);
        $id = $idarray['id'];

        $result = mysqli_query($link, "INSERT INTO $table VALUES ($id, '$username', '$password', '$email');");
        ob_start();
        $mainpage_url = '../mainpage.html';
        header('Location: '.$mainpage_url);
        ob_end_flush();
        exit();
    }
} else {
    ob_start();
    $notrepeatpassword_url = '../registration_error/notrepeatpass.html';
    header('Location: '.$notrepeatpassword_url);
    ob_end_flush();
    exit();
}

/* СТАРЫЙ КОД, УДАЛИТЬ!
// echo '<p>Массивы заполнены, выполняется условие если такая почта/логин есть в БД</p>';
        // в строках 26 и 27 ошибка. $loginquerydb - пуст, такого логина нет в БД
        

        echo "<p>Логин пользователя: $username</p>";
        // echo "<p>Логин из БД: $usernamelogindb</p>";
        exit();
        /*
        if (!empty($loginquery)) {
            echo "<p>Такой логин уже зарегестрирован.</p>";
            exit();
        } else {
            echo "<p>Пользователь с такой почтой уже зарегестрирован</p>";
            exit();
        } 
    } else {
        echo '<p>Массивы пусты, выполняется вставка данных в БД</p>';
        exit();
        // определяем занят логин или пароль

    }

    // $emailquery = mysqli_query($link, "SELECT username, password FROM $table WHERE email = '$email';");
    // выведем переменные из обоих ассоциативных массивов


    /* 
    $table = "userstesttable";
    $loginquery = mysqli_query($link, "SELECT username, password FROM $table WHERE username = '$username';");
    $emailquery = mysqli_query($link, "SELECT username, password FROM $table WHERE email = '$email';");
    if (empty($loginquery) && empty($emailquery)) {
        // если и логин и email отсутствуют в базе происходит процедура регистрации и пользователь перенаправляется на главную страницу сайта
        $result = mysqli_query($link, "INSERT INTO userstesttable (username, password, email) VALUES(NULL, '$username', '$password', '$email');");
        ob_start();
        $mainpage_url = '../mainpage.html';
        header('Location: '.$mainpage_url);
        ob_end_flush();
        exit();
    } else {
       // проверем, логин есть в базе или пароль
       if (!empty($loginquery)) {
            // логин уже зарегестрирован в БД, пройдите процедуру авторизации или смените логин и зарегестрируйтесь
            ob_start();
            $registrationloginerror_url = '../registration_error/loginerror.html';
            header('Location: '.$registrationloginerror_url);
            ob_end_flush();
            exit();
       } else {
            if (!empty($emailquery)) {
                ob_start();
                $registrationmailerror_url = '../registration_error/mailerror.html';
                header('Location: '.$registrationmailerror_url);
                ob_end_flush();
                exit();
            } else {
                // Логин и пароль есть в БД
                ob_start();
                $registrationpassloginerror_url = '../registration_error/loginmailerror.html';
                header('Location: '.$registrationpassloginerror_url);
                ob_end_flush();
                exit();
            }
       }
    } */


?>