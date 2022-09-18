<?php

$name = readline("Здравствуйте, как Вас зовут? \n");
$content = "";
$fullTime = 0;
$countTasks = (int)readline("Каково количество задач, запланированных на день? \n");

for ($i = 1; $i <= $countTasks; $i++) {
    $task = readline("Какая $i задача стоит перед вами сегодня? \n");
    $content .= " - " . $task;
    $time = (int)readline("Сколько примерно времени эта задача займет? \n");
    $content .= " (" . $time . "ч)" . PHP_EOL;
    $fullTime += $time;
}

echo PHP_EOL . "$name, сегодня у вас запланировано $countTasks приоритетных задачи на день: \n" .
    $content . "Примерное время выполнения плана = $fullTime ч" . PHP_EOL;
