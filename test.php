<?php
// test.php
declare(strict_types=1);

spl_autoload_register();

use Business\FilmService;
use Data\DvdDAO;
use Data\FilmDAO;

$filmDAO = new FilmDAO;

//$films = $filmDAO->getFilms();

//print_r($films);

$dvdDAO = new DvdDAO;

//$dvds = $dvdDAO->getDVDs();

//print_r($dvds);

//$dvdFilm = $dvdDAO->findDVDsByFilmId(19);

//print_r($dvdFilm);

$filmService = new FilmService;

//$films = $filmService->getAllFilms();

//$insideout = $filmService->newDVD(30);

//print_r($films);

//$allInfo = $filmDAO->getFilmById(24);

//$infoFilm = $filmService->getInfoFromFilm(24);

//$status = $filmService->alterStatus(15);

//$delete = $filmService->eraseDVD(22);

$deletefilm = $filmService->eraseFilmEnDVDs(30);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>

<body>
    <pre>
<?php echo $deletefilm; ?>
</pre>
</body>

</html>