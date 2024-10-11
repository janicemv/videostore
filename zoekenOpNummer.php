<?php
//toonDVDs.php

declare(strict_types=1);

session_start();

spl_autoload_register();


use Business\FilmService;

$filmService = new FilmService();

$message = $_GET['message'] ?? '';

$error = $_GET['error'] ?? '';

$number = $_GET['findbynumber'] ?? null;

$filmsFound = [];

$film = '';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['findbynumber'])) {
    $searchedNumber = (int)$_GET['findbynumber'];

    if ($searchedNumber) {
        $filmService = new FilmService();

        $films = $filmService->getAllFilms();
        foreach ($films as $film) {
            $foundFilm = false;
            $foundDVDs = [];

            if ($film->getId() == $searchedNumber) {
                $foundFilm = true;
            }

            foreach ($film->getDVDs() as $dvd) {
                if ($dvd->getDVDnummer() == $searchedNumber || $foundFilm) {
                    $foundDVDs[] = $dvd;
                }
            }

            if ($foundFilm || !empty($foundDVDs)) {
                $filmsFound[] = [
                    'film' => $film,
                    'dvds' => $film->getDVDs()
                ];
            }
        }

        if (empty($filmsFound)) {
            $error = "Geen film of DVD gevonden met dit nummer.";
        }
    } else {
        $error = "Voer een geldig nummer in.";
    }
}


include("Presentation/zoekenForm.php");
