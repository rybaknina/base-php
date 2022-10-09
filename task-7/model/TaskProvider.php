<?php

class TaskProvider
{
    public function __construct(private PDO $pdo)
    {
    }

    /**
     * @return array
     */
    public function getUndoneList(int $userId): array
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM tasks WHERE user_id = :id'
        );
        $statement->execute([
            'id' => $userId,
        ]);

        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);
    }

    public function addTask(Task $task, int $userId): bool
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO tasks (user_id, description) VALUES (:user_id, :description)'
        );

        return $statement->execute([
            'user_id' => $userId,
            'description' => $task->getDescription()
        ]);
    }

    public function deleteTask(int $taskId, int $userId): bool
    {
        $statement = $this->pdo->prepare(
            'DELETE FROM tasks WHERE id = :id AND user_id = :user_id'
        );
        $res = $statement->execute([
            'user_id' => $userId,
            'id' => $taskId
        ]);
        return $res;
    }

}