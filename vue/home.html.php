<?php
session_start();

use Controller\SessionController;

if (!SessionController::sessionUserExist()) {
    header("Location:" . LINK);
}
?>
<nav>
    <h1 class="year dflex jcc aic"> <?= $_SESSION['year'][0]['libelle'] ?> </h1>
    <ul>
        <div class="img dflex fdc">
            <img src="Capture d’écran du 2023-05-27 16-14-28.png" alt="">
        </div>
        <li>
            <a href="<?= LINK ?>lister" class="no-underline" id="list" class="nav">Liste apprenant</a>
        </li>
        <li>
            <a href="<?= LINK ?>niveau" class="no-underline" id="service" class="nav">Liste classe et niveau</a>
        </li>
        <li>
            <a href="<?= LINK ?>discipline" class="no-underline" id="contect" class="nav">Les disciplines</a>
        </li>
        <li>
            <a href="<?= LINK ?>listean" class="no-underline" id="contect" class="nav">Année</a>
        </li>
        <a href="<?= LINK ?>disconnect" class="fa-solid fa-right-from-bracket logout"></a>
    </ul>
</nav>