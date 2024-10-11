<?php
// Presentation/DVDlist.php

declare(strict_types=1);

$title = "DVD lijst: " . $film->getTitel();

?>

<!DOCTYPE html>
<html lang="en">
<?php require_once "presentation/components/head.php" ?>

<body>
    <?php require_once "presentation/components/menu.php"; ?>
    <div class="container">
        <h1><?= $title ?></h1>

        <?php
        if ($error): ?>
            <div class="alert alert-danger">
                <p class="error"><?php echo $error; ?></p>
            </div>
        <?php endif; ?>

        <?php
        if ($message): ?>
            <div class="alert alert-success">
                <p class="message"><?php echo $message; ?></p>
            </div>
        <?php endif; ?>

        <table class="table">
            <tr>
                <th>DVD Nummer</th>
                <th class="text-center">Status</th>
                <th class="text-center">Change status</th>
                <th class="text-center">DVD Verwijderen</th>
            </tr>
            <?php foreach ($film->getDVDs() as $dvd): ?>
                <tr>
                    <td><?= $dvd->getDVDnummer(); ?></td>
                    <td class="text-center">
                        <?= $dvd->getStatus() === 1 ? "Beschikbaar" : "Verhuurd"; ?>
                    </td>
                    <td class="text-center">
                        <form action="veranderStatusController.php" method="POST">
                            <input type="hidden" name="film_id" value="<?= $dvd->getFilmId(); ?>">
                            <input type="hidden" name="dvd_nummer" value="<?= $dvd->getDVDnummer(); ?>">
                            <button type="submit" class="btn btn-sm <?= $dvd->getStatus() === 1 ? 'btn-success' : 'btn-warning'; ?>">
                                <?= $dvd->getStatus() === 1 ? 'Verhuren' : 'Terug Brengen'; ?>
                            </button>
                        </form>
                    </td>
                    <td class="text-center"><a class="text-decoration-none" href="deleteController.php?action=verwijderdvd&dvd_nummer=<?= $dvd->getDVDnummer(); ?>&film_id=<?= $dvd->getFilmId(); ?>">🗑️</td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>



        <?php require_once "presentation/components/footer.html"; ?>
    </div>
</body>

</html>