<?php

namespace Domain\Model;

class User
{
    public readonly string $uuid;

    public function __construct(
        private string $email,
        private string $password,
        string $uuid = null,
    ) {
        $this->uuid = $uuid ?? uuid_create(UUID_TYPE_TIME);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
