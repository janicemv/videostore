<?php
// deleteController.php 

declare(strict_types=1);

session_start();

spl_autoload_register();

use Business\FilmService;
use Exceptions\FilmException;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'verwijderdvd' && isset($_GET['dvd_nummer'])) {
    $filmService = new FilmService();
    $filmService->eraseDVD((int)$_GET['dvd_nummer']);
    $message = 'DVD successvol verwijderd';


    header("Location: toonDVDs.php?id={$_GET['film_id']}&message=$message");
    exit;
}

try {

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'verwijderfilm' && isset($_GET['id'])) {
        $filmService = new FilmService();
        $filmService->eraseFilmEnDVDs((int)$_GET['id']);
        $message = 'Titel en DVDS successvol verwijderd';

        header("Location: toonfilms.php?message=$message");
        exit;
    }
} catch (FilmException $e) {
    $error = urlencode($e->getMessage());
    header("Location: toonfilms.php?error=$error");
}
