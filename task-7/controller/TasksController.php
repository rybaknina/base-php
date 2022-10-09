<?php
include_once "model/Task.php";
include_once "model/TaskProvider.php";
include_once "model/User.php";

$pdo = require 'db.php';

session_start();

$pageHeader = "Задачи";

$username = null;

if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']->getUsername();
} else {
    header("Location: /");
    die();
}
$taskProvider = new TaskProvider($pdo);

$userId = $_SESSION['id'] ?? null;

if (isset($_GET['action']) && $_GET['action'] === 'add') {
    $taskText = strip_tags($_POST['task']);
    $task = new Task(null, null, $taskText);
    $taskProvider->addTask($task, $userId);
    header("Location: /?controller=tasks");
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'done') {
    $taskId = $_GET['key'] ?? null;
    $taskProvider->deleteTask($taskId, $userId);
    header("Location: /?controller=tasks");
    die();
}


$tasks = $taskProvider->getUndoneList($userId);
include "view/tasks.php";