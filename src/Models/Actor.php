<?php

namespace App\Models;

class Actor
{

    public function __construct(
        private int $id,
        private string $name,
        private int $age,
        private string $biography,
        private string $country,
        private string $avatar,
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function age(): int
    {
        return $this->age;
    }

    public function biography(): string
    {
        return $this->biography;
    }

    public function country(): string
    {
        return $this->country;
    }

    public function avatar(): string
    {
        return $this->avatar;
    }
}
