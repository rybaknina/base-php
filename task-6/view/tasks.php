<head>
    <meta charset="UTF-8">
    <title><?= $pageHeader ?></title>
</head>

<body>
<h1><?= $pageHeader ?></h1>

<?php include "menu.php" ?>

<?=var_dump($_SESSION["tasks"])?>
<form action="/?controller=tasks&action=add" method="post">
    <input type="text" name="task" placeholder="Описание задачи">
    <input type="submit" value="Добавить">
</form>
<?php foreach ($tasks as $key => $task): ?>
    <div>
        <?=$task->getDescription()?>
        <a href="/?controller=tasks&action=done&key=<?=$key?>">[Done]</a><br>
    </div>
<?php endforeach; ?>

</body>
