<?php
// Presentation/zoekenForm.php

declare(strict_types=1);

$title = "Zoek op Nummer";

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

        <form action="zoekenOpNummer.php" method="GET">
            <label for="findbynumber">Voer een film of DVD nummer in:</label>
            <input type="number" name="findbynumber" required>
            <button type="submit" class="btn btn-sm btn-success">Zoeken</button>
        </form>

        <hr>

        <?php if ($film): ?>
            <table class="table">
                <tr>
                    <th>Film Titel (id)</th>
                    <th>DVD Nummer</th>
                    <th class="text-center">Exemplaren aanwezig</th>
                </tr>
                <?php foreach ($filmsFound as $result): ?>
                    <tr>
                        <td>
                            <a class="link-info text-decoration-none" href="toonDVDs.php?id=<?= $result['film']->getId(); ?>"><?= $result['film']->getTitel(); ?> (<?= $result['film']->getId(); ?>)</a>
                        </td>

                        <td>
                            <?php foreach ($result['dvds'] as $index => $dvd): ?>
                                <?php if ($dvd->getDVDnummer() == $searchedNumber): ?>
                                    <b><?= $dvd->getDVDnummer(); ?></b>
                                <?php else: ?>
                                    <?= $dvd->getDVDnummer(); ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>

                        <td class="text-center">
                            <?= count(array_filter($result['dvds'], fn($dvd) => $dvd->getStatus() === 1)); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>


        <?php require_once "presentation/components/footer.html"; ?>
    </div>
</body>

</html>