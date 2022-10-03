<a href="/">Главная</a>
<a href="/?controller=security">Авторизации</a>
<a href="/?controller=tasks">Задачи</a><br>
<?php $username = null;
if (isset($_SESSION["user"])) {
    $username = $_SESSION["user"]->getUsername();
}
?>
<?php if (is_null($username)): ?>
    <a href="/?controller=security">Войти</a>
<?php else: ?>
    <p>Рады вас приветствовать, <?= $username ?>. <a href="/?controller=security&action=logout"">[Выход]</a></p>
<?php endif ?><br>