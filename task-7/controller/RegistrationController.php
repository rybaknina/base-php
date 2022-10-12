<?php
require_once "model/User.php";
require_once 'model/UserProvider.php';
$pdo = require 'db.php';

session_start();

$error = null;

if (isset($_POST['reg_name']) && isset($_POST['reg_username']) && isset($_POST['reg_password'])) {
    ['reg_name' => $regName, 'reg_username' => $regUsername, 'reg_password' => $regPassword] = $_POST;

    $user = new User(null, $regUsername);
    $user->setName($regName);

    $regUser = new UserProvider($pdo);
    $userId =  $regUser->registerUser($user, $regPassword);
    if ($userId === null) {
        $error = 'Ошибка регистрации пользователя: такой уже существует';
    } else {
        $user->setId($userId);
        $_SESSION['user'] = $user;
        $_SESSION['id'] = $user->getId();

        header('Location: /');
        die();
    }
}

require_once 'view/registration.php';
