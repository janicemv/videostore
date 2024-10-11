<?php

//DVD.php

declare(strict_types=1);

namespace Entities;


class DVD
{

    private int $dvdnummer;
    private int $filmId;
    private int $status;

    public function __construct(int $filmId, int $dvdnummer, int $status)
    {
        $this->filmId = $filmId;
        $this->dvdnummer = $dvdnummer;
        $this->status = $status;
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
}
