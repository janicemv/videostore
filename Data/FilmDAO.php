<?php

///Data/FilmDAO.php

namespace Data;

use \PDO;
use Entities\Film;
use Entities\FilmDVD;
use Entities\DVD;

class FilmDAO
{

    public function getFilms(): array
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $sql = "SELECT id, titel, duurtijd FROM videotheek_films ORDER BY titel";
        $resultSet = $dbh->query($sql);
        $filmLijst = array();
        foreach ($resultSet as $rij) {
            $film = new Film((int) $rij["id"], $rij["titel"], (int) $rij["duurtijd"]);
            array_push($filmLijst, $film);
        }

        $dbh = null;
        return $filmLijst;
    }


    public function isFilm(string $titel): ?int
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $sql = "SELECT id FROM videotheek_films WHERE titel =:titel";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':titel' => $titel]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbh = null;

        return $result ? (int) $result['id'] : null;
    }

    public function addFilm(string $titel, float $duurtijd): int
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $sql = "INSERT INTO videotheek_films (titel, duurtijd) VALUES (:titel, :duurtijd)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':titel' => $titel, ':duurtijd' => $duurtijd]);

        $filmId = (int)$dbh->lastInsertId();

        return $filmId;
    }

    public function getFilmById($filmId): Film
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $sql = "SELECT videotheek_films.id, titel, duurtijd, DVD_nummer, film_id, statusId 
            FROM videotheek_films
            LEFT JOIN videotheek_dvds 
            ON videotheek_films.id = videotheek_dvds.film_id
            WHERE videotheek_films.id = :filmId";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':filmId', $filmId, PDO::PARAM_INT);
        $stmt->execute();

        $film = null;
        $dvdList = [];

        foreach ($stmt as $row) {
            if ($film === null) {
                $film = new Film((int) $row['id'], $row['titel'], (float) $row['duurtijd']);
            }

            if ($row['DVD_nummer'] !== null && $row['statusId'] !== null) {
                $dvd = new DVD((int) $row['film_id'], (int) $row['DVD_nummer'], (int) $row['statusId']);
                $dvdList[] = $dvd;
            }
        }

        if ($film !== null) {
            $film->setDVDs($dvdList);
        }

        $dbh = null;

        return $film;
    }

    public function getAllInfo($filmId): array
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $sql = "SELECT DVD_nummer, film_id, statusId, videotheek_films.id, titel 
        FROM videotheek_dvds
        INNER JOIN videotheek_films 
        ON videotheek_dvds.film_id = videotheek_films.id
        WHERE film_id = :filmId
        ORDER BY titel";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':filmId', $filmId, PDO::PARAM_INT);
        $stmt->execute();

        $DVDlijst = [];
        foreach ($stmt as $rij) {
            $dvd = new FilmDVD((int) $rij["DVD_nummer"], (int) $rij["film_id"], (int) $rij["statusId"], $rij["titel"]);
            $DVDlijst[] = $dvd;
        }

        $dbh = null;
        return $DVDlijst;
    }

    public function deleteFilm($filmId)
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $sql = "DELETE FROM videotheek_dvds WHERE film_id = :filmId";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':filmId', $filmId, PDO::PARAM_INT);
        $stmt->execute();

        $sql = "DELETE FROM videotheek_films WHERE id = :filmId";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':filmId', $filmId, PDO::PARAM_INT);
        $stmt->execute();

        $dbh = null;
    }
}
