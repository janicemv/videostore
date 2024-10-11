<?php
// registerController.php 

declare(strict_types=1);

session_start();

spl_autoload_register();

use Business\FilmService;
use Exceptions\FilmException;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        if (isset($_POST['titel'], $_POST['duurtijd']) && !empty(trim($_POST['titel'])) && !empty(trim($_POST['duurtijd']))) {
            $titel = trim($_POST['titel']);
            $duurtijd = (float)$_POST['duurtijd'];

            if ($duurtijd <= 0) {
                throw new FilmException('Duurtijd moet positief zijn!');
            }

            $filmService = new FilmService();
            $newFilm = $filmService->newFilm($titel, $duurtijd);

            header("Location: toonfilms.php");
        } else {
            throw new FilmException('Titel en duurtijd mogen niet leeg zijn!');
        }
    } catch (FilmException $e) {
        $error = urlencode($e->getMessage());
        header("Location: nieuwfilm.php?error=$error");
    }
}
