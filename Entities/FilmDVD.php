<?php

//Entities/FilmDVD.php

declare(strict_types=1);

namespace Entities;


class FilmDVD
{

    private int $dvdnummer;
    private int $filmId;
    private int $status;
    private string $titel;

    public function __construct(int $dvdnummer, int $filmId, int $status, string $titel)
    {
        $this->filmId = $filmId;
        $this->dvdnummer = $dvdnummer;
        $this->status = $status;
        $this->titel = $titel;
    }

    public function getDVDnummer()
    {
        return $this->dvdnummer;
    }

    public function getFilmId()
    {
        return $this->filmId;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getTitel()
    {
        return $this->titel;
    }
}
