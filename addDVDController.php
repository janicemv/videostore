<?php
// addDVDController.php 

declare(strict_types=1);

spl_autoload_register();

use Business\FilmService;
use Exceptions\FilmException;

try {

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'toevoegen' && isset($_GET['id'])) {
        $filmLijst = new FilmService();
        $filmLijst->newDVD((int)$_GET['id']);

        header("Location: toonfilms.php");
        exit;
    }
} catch (FilmException $e) {
    $error = urlencode($e->getMessage());
    header("Location: nieuwfilm.php?error=$error");
}
