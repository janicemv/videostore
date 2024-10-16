<?php
// menu.php
declare(strict_types=1);

use Business\SessionService;

?>


<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Videotheek</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="toonfilms.php">Filmlijst</a>
                <a class="nav-item nav-link" href="nieuwfilm.php">Film toevoegen</a>
                <a class="nav-item nav-link" href="zoekenOpNummer.php">Zoeken</a>

            </div>


            <div>
                <ul class="nav nav-item nav-link justify-content-end">
                    <li><a class="nav-item nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>

        </div>

    </nav>
</div>