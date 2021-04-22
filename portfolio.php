<?php
$title = "Portfolio";
require_once 'functions/functions.php';


?>

<!-- Contenu -->

<?php require "elems/header.php"; ?>
<div class="content">
        <div class="elem_content">
        <?= add_project("Compteur de vues", "counter.JPG", "\projects\counter.php"); ?>
        <?= add_project("Créneaux dynamiques", "dates.JPG", "\projects\dates.php"); ?>
        <?= add_project("Sécurité -18 ans", "nsfw.JPG", "\projects\\nsfw.php"); ?>
        <?= add_project("Lecture & Ecriture", "pizza.JPG", "\projects\pizza.php"); ?>
        <?= add_project("Panel multichoix", "panel.JPG", "\projects\panel.php"); ?>

        </div>
        <div class="paging">
                ! Pagination en Construction !
        </div>
</div>

<?php require "elems/footer.php" ?>