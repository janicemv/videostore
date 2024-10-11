<?php
// veranderStatus.php

declare(strict_types=1);

spl_autoload_register();

use Business\FilmService;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dvdNummer = (int) $_POST['dvd_nummer'];
    $currentStatus = (int) $_POST['status'];

    $dvdService = new FilmService();

    $dvdService->alterStatus($dvdNummer);

    header("Location: toonDVDs.php?id={$_POST['film_id']}");
    exit;
}
