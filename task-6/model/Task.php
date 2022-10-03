<?php

class Task
{
    private bool $isDone = false;

    public function __construct(private string $description)
    {
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return bool
     */
    public function isDone(): bool
    {
        return $this->isDone;
    }

    /**
     * @param bool $isDone
     * @return Task
     */
    public function setIsDone(bool $isDone): self
    {
        $this->isDone = $isDone;
        return $this;
    }

}