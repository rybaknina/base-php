<?php

class Comment
{
    /**
     * @param User $author
     * @param Task $task
     * @param string $text
     */
    public function __construct(private User $author, private Task $task, private string $text)
    {
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @return Task
     */
    public function getTask(): Task
    {
        return $this->task;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}
