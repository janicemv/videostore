<?php
// Presentation/filmList.php

declare(strict_types=1);

$title = "Filmlijst";

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

        <?php if (!empty($films)): ?>

            <table class="table table-hover">
                <tr class="table-primary align-middle">
                    <th>Titel</th>
                    <th>Nummers</th>
                    <th class="text-center">Exemplaren aanwezig</th>
                    <th class="text-center">DVD toevoegen</th>
                    <th class="text-center">Verwijderen <br>(Titel en DVDs)</th>
                </tr>
                <tbody>
                    <?php foreach ($films as $film): ?>
                        <tr>
                            <td><a class="link-info text-decoration-none" href="toonDVDs.php?id=<?= $film->getId(); ?>"><?= $film->getTitel(); ?></a></td>

                            <td>
                                <?php
                                $dvds = $film->getDVDs();
                                $avaliableDVDs = 0;
                                foreach ($dvds as $dvd): ?>
                                    <?php if ($dvd->getstatus() === 1):
                                        $avaliableDVDs++; ?>
                                        <b><?= $dvd->getDVDnummer(); ?></b>
                                    <?php else: ?>
                                        <?= $dvd->getDVDnummer(); ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td class="text-center"><?= $avaliableDVDs; ?></td>
                            <td class="text-center"><a class="text-decoration-none" href="addDVDController.php?action=toevoegen&id=<?= $film->getId(); ?>"><b>➕ 💿</b></td>
                            <td class="text-center"><a class="text-decoration-none" href="deleteController.php?action=verwijderfilm&id=<?= $film->getId(); ?>"><b>🗑️</b></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Geen films gevonden.</p>
        <?php endif; ?>

        <?php require_once "presentation/components/footer.html"; ?>
    </div>
</body>

</html>