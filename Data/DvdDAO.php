<?php

///Data/DVD_DAO.php

namespace Data;

use \PDO;
use Entities\DVD;
use Entities\FilmDVD;
use Exceptions\FilmException;

class DvdDAO
{

    public function getDVDs(): array
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $sql = "SELECT DVD_nummer, film_id, statusId FROM videotheek_dvds ORDER BY film_id";
        $resultSet = $dbh->query($sql);
        $DVDlijst = [];
        foreach ($resultSet as $rij) {
            $dvd = new DVD((int) $rij["DVD_nummer"], (int)$rij["film_id"], (int) $rij["statusId"]);
            $DVDlijst[] = $dvd;
        }

        $dbh = null;
        return $DVDlijst;
    }

    public function findDVDsByFilmId(int $filmId): array
    {
        $dvds = [];

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $sql = "SELECT * FROM videotheek_dvds WHERE film_id = :filmId ORDER BY dvd_nummer DESC";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':filmId', $filmId);
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            $dvds[] = new DVD($row['film_id'], $row['DVD_nummer'], $row['statusId']);
        }

        $dbh = null;

        return $dvds;
    }

    public function addDVD($filmId)
    {

        if ($filmId === null) {
            throw new FilmException('Invalid filmId: cannot be null');
        }

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "INSERT INTO videotheek_dvds (film_id, statusId) VALUES (:film_id, 1)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':film_id', $filmId);
        $stmt->execute();

        $DVD_nummer = (int)$dbh->lastInsertId();

        $dbh = null;

        return $DVD_nummer;
    }

    public function changeStatus($DVD_nummer): int
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $sql = "SELECT statusId FROM videotheek_dvds WHERE DVD_nummer = :DVD_nummer";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':DVD_nummer', $DVD_nummer, PDO::PARAM_INT);
        $stmt->execute();
        $currentStatus = (int)$stmt->fetchColumn();

        $newStatus = ($currentStatus === 1) ? 2 : 1;

        $sql = "UPDATE videotheek_dvds SET statusId = :newStatus WHERE DVD_nummer = :DVD_nummer";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':newStatus', $newStatus, PDO::PARAM_INT);
        $stmt->bindParam(':DVD_nummer', $DVD_nummer, PDO::PARAM_INT);
        $stmt->execute();

        $dbh = null;

        return $newStatus;
    }

    public function deleteDVD($DVDnummer)
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $sql = "DELETE FROM videotheek_dvds WHERE DVD_nummer = :DVD_nummer";
        $stmt = $dbh->prepare($sql);

        $stmt->bindParam(':DVD_nummer', $DVDnummer, PDO::PARAM_INT);
        $stmt->execute();

        $dbh = null;
    }
}
