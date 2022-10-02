<?php

class Task
{
    private DateTime $dateCreated;
    private DateTime $dateUpdated;
    private DateTime $dateDone;
    private bool $isDone = false;
    private array $comments = [];

    /**
     * @param string $description
     * @param int $priority
     * @param User $user
     */
    public function __construct(private User $user, private string $description, private int $priority)
    {
        $this->setDateCreated(new DateTime);
    }

    public function markAsDone(): void
    {
        $this->setDateUpdated(new DateTime);
        $this->setDateDone(new DateTime);
        $this->setIsDone();
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return DateTime
     */
    public function getDateCreated(): DateTime
    {
        return $this->dateCreated;
    }

    /**
     * @param DateTime $dateCreated
     * @return Task
     */
    public function setDateCreated(DateTime $dateCreated): self
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateUpdated(): DateTime
    {
        return $this->dateUpdated;
    }

    /**
     * @param DateTime $dateUpdated
     * @return Task
     */
    public function setDateUpdated(DateTime $dateUpdated): self
    {
        $this->dateUpdated = $dateUpdated;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateDone(): DateTime
    {
        return $this->dateDone;
    }

    /**
     * @param DateTime $dateDone
     * @return Task
     */
    public function setDateDone(DateTime $dateDone): self
    {
        $this->dateDone = $dateDone;
        return $this;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @return bool
     */
    public function isDone(): bool
    {
        return $this->isDone;
    }

    /**
     */
    private function setIsDone(): void
    {
        $this->isDone = true;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * @param Comment $comment
     * @return Task
     */
    public function setComment(Comment $comment): self
    {
        $this->comments[] = $comment;
        return $this;
    }
}