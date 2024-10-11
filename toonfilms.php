<?php
//toonfilms.php

declare(strict_types=1);

session_start();

spl_autoload_register();

use Business\FilmService;

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

$filmService = new FilmService();
$films = $filmService->getAllFilms();

$message = $_GET['message'] ?? '';

$error = $_GET['error'] ?? '';



include("Presentation/filmList.php");
