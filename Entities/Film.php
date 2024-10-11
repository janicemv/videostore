<?php

//film.php

declare(strict_types=1);

namespace Entities;


class Film
{
    private int $id;
    private string $titel;
    private float $duurtijd;
    private array $dvds = [];

    public function __construct(int $id, string $titel, float $duurtijd)
    {
        $this->id = $id;
        $this->titel = $titel;
        $this->duurtijd = $duurtijd;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitel(): string
    {
        return $this->titel;
    }

    public function getDuurtijd(): float
    {
        return $this->duurtijd;
    }

    public function getDVDs(): array
    {
        return $this->dvds;
    }

    public function setDVDs(array $dvds): void
    {
        $this->dvds = array_merge($this->dvds, $dvds);
    }
}
