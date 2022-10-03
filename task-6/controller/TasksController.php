<?php
include_once "model/Task.php";
include_once "model/TaskProvider.php";
include_once "model/User.php";

session_start();

$pageHeader = "Задачи";

$username = null;
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']->getUsername();
} else {
    header("Location: /");
    die();
}
$taskProvider = new TaskProvider();

if (isset($_GET['action']) && $_GET['action'] === 'add') {
    $taskText = strip_tags($_POST['task']);
    $task = new Task($taskText);
    $taskProvider->addTask($task);
    header("Location: /?controller=tasks");
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'done') {
    $key = $_GET['key'];
    $taskProvider->deleteTask($key);
    header("Location: /?controller=tasks");
    die();
}


$tasks = $taskProvider->getUndoneList();
include "view/tasks.php";