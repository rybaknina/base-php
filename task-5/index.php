<?php

require_once "User.php";
require_once "Task.php";
require_once "Comment.php";
require_once "TaskService.php";

$users = [
    new User("User 1", "user1@mail.com"),
    new User("User 2", "user2@mail.com")
];
$tasks = [
    new Task($users[0], "Task #1", 6),
    new Task($users[1], "Task #2", 1)
];

TaskService::addComment($users[0], $tasks[0], "Comment 1 for Task 1");
TaskService::addComment($users[0], $tasks[0], "Comment 2 for Task 1");
TaskService::addComment($users[1], $tasks[1], "Comment 1 for Task 2");

$tasks[1]->markAsDone();

echo "Comments: " . PHP_EOL;
foreach ($tasks as $task) {
    foreach ($task->getComments() as $comment) {
        echo "author: " . $comment->getAuthor()->getName() . ". ";
        echo "comment: " . $comment->getText() . ", ";
        $taskIn = $comment->getTask();
        echo "task: " . date_format($taskIn->getDateCreated(), "d/m/Y h:i:s") . " " .
            $taskIn->getDescription() .
            " with priority " . $taskIn->getPriority() .
            ($taskIn->isDone() ? " done" : " not done") . PHP_EOL;
    }
}

