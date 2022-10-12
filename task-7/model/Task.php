<?php

class Task
{
    private bool $isDone = false;

    public function __construct(private ?int $userId = null, private ?int $id = null, private ?string $description = null)
    {
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return Task
     */
    public function setUserId(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

}