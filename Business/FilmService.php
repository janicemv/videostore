<?php
// Business/FilmService.php

declare(strict_types=1);

namespace Business;

use Data\DvdDAO;
use Data\FilmDAO;
use Entities\Film;
use Exceptions\FilmException;

class FilmService
{

    public function getAllFilms()
    {
        $filmDAO = new FilmDAO();
        $filmLijst = $filmDAO->getFilms();

        $dvdDAO = new DvdDAO();

        foreach ($filmLijst as $film) {

            $dvdLijst = $dvdDAO->findDVDsByFilmId($film->getId());

            $filmDVDs = [];

            foreach ($dvdLijst as $dvd) {

                $filmDVDs[] = $dvd;
            }
            $film->setDVDs($filmDVDs);
        }

        return $filmLijst;
    }

    public function newFilm(string $titel, float $duurtijd): ?int
    {
        $filmDAO = new FilmDAO();
        if ($filmDAO->isFilm($titel) === null) {

            return $filmDAO->addFilm($titel, (float)$duurtijd);
        } else {
            throw new FilmException('Titel bestaat!');
        }
    }

    public function newDVD($filmId): int
    {
        $dvdDAO = new DvdDAO;

        return $dvdDAO->addDVD($filmId);
    }

    public function getInfoFromFilm($filmId): Film
    {
        $filmDAO = new FilmDAO;

        return $filmDAO->getFilmById($filmId);
    }

    public function alterStatus($DVDnummer): int
    {
        $dvdDAO = new DvdDAO;

        return $dvdDAO->changeStatus($DVDnummer);
    }

    public function eraseDVD($DVDnummer)
    {
        $dvdDAO = new DvdDAO;

        return $dvdDAO->deleteDVD($DVDnummer);
    }

    public function eraseFilmEnDVDs($filmId)
    {
        $filmDAO = new FilmDAO;

        return $filmDAO->deleteFilm($filmId);
    }
}
