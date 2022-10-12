<head>
    <meta charset="UTF-8">
    <title><?= $pageHeader ?></title>
</head>

<body>
<h1><?= $pageHeader ?></h1>

<?php include "menu.php" ?>

<form action="/?controller=tasks&action=add" method="post">
    <input type="text" name="task" placeholder="Описание задачи">
    <input type="submit" value="Добавить">
</form>
<?php foreach ($tasks as $key => $task): ?>
    <div id="<?= $task->getId() ?>">
        <?= $task->getDescription() ?>
        <a href="/?controller=tasks&action=done&key=<?= $task->getId() ?>">[Done]</a>
        <br><br>
    </div>
<?php endforeach; ?>

</body>
