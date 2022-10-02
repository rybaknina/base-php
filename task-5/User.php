<?php

class User
{
    /**
     * @param string $name
     * @param string $email
     */
    public function __construct(private string $name, private string $email)
    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}