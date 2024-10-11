<?php
//toonDVDs.php

declare(strict_types=1);

session_start();

spl_autoload_register();

$message = $_GET['message'] ?? '';

$error = $_GET['error'] ?? '';

use Business\FilmService;

if (isset($_GET['id'])) {
    $filmId = (int)$_GET['id'];
    $filmService = new FilmService();
    $film = $filmService->getInfoFromFilm($filmId);

    if ($film) {
        include("Presentation/DVDlist.php");
    } else {
        echo "Film not found.";
    }
} else {
    echo "Film ID not provided.";
}
