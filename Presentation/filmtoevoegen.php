<?php
// Presentation/filmtoevoegen.php

declare(strict_types=1);

$title = "Film toevoegen";

?>

<!DOCTYPE html>
<html lang="en">
<?php require_once "presentation/components/head.php" ?>

<body>
    <?php require_once "presentation/components/menu.php"; ?>
    <div class="container">
        <h1><?= $title ?></h1>

        <form action="addFilmController.php" method="POST">
            <label for="titel">Titel:</label>
            <input type="text" name="titel" id="titel">
            <br>
            <label for="duurtijd">Duurtijd (minuten):</label>
            <input type="number" name="duurtijd" id="duurtijd" min="1">
            <br><br>
            <input type="submit" value="Toevoegen">
        </form>

        <?php
        if ($error): ?>
            <div class="alert alert-danger">
                <p class="error"><?php echo $error; ?></p>
            </div>
        <?php endif; ?>

        <?php require_once "presentation/components/footer.html"; ?>
    </div>
</body>

</html>