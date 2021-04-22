<?php
require_once "../functions/functions.php";
require_once 'config.php';

date_default_timezone_set('Europe/Paris');
$hour = (int)date('G');
/* Verification ouverture selon le jour/heures de l'ordi de l'user */
if (empty(CRENEAUX[date('N') - 1])) // Si c'est un jour fermé
    $open = false;
else {
    $creneaux = CRENEAUX[date('N') - 1];
    $open = in_creneaux($hour, $creneaux);
}
$color = $open ? 'green' : 'red';

/* Verification ouverture selon le jour/heures de l'user */
$i = 0;
$msg = "";
if (isset($_GET['hours']) && isset($_GET['days'])) {
    $hour2 = $_GET['hours'];
    if (empty(CRENEAUX[$_GET['days']])) { // Si c'est un jour fermé
        $open2 = false;
        $msg = 'Le magasin sera fermé !';
    } else {
        $creneaux2 = CRENEAUX[$_GET['days']];
        $open2 = in_creneaux($hour2, $creneaux2);
        $msg = $open2 ? 'Le magasin sera ouvert !' : 'Le magasin sera fermé';
    }
} else
    $msg = " Selectionner un jour et une heure pour voir si le magasin est ouvert";

?>

<?php require "../elems/header.php"; ?>

<div class="content">
    <div class="content_project">
        <div class="txt">
            <h1> Créneaux dynamique </h1>
            <h3>Création d'un créneaux dynamique d'un magasin <br>
                + Un formulaire rempli par l'utilisateur(jour/heure) qui indique si c'est ouvert.<br>
                <br>
                Contrainte :<br>
                <br>
                - Indiquer les jours de la semaine<br>
                - Indiquer 1 ou deux créneaux pour les jours<br>
                - Indiquer que le samedi et le dimanche sont fermé<br>
                - Mettre en couleur le jour actuel ( Vert : Ouvert / Rouge : Fermé)<br>
                - Faire une alerte qui indique si le magasin est ouvert ou non selon les créneaux/jours<br>
                <br>
                Langage utilisé: PHP, HTML<br>
                Compétences: Dates PHP.
            </h3>
        </div>
        <div class="dates_container">
            <div class="dates">
                <!-- Horaires d'ouverture -->
                <h2> Horaires d'ouvertures </h2>
                <?php if ($open) : ?>
                    <h3> Le magasin est ouvert ! </h3>
                <?php else : ?>
                    <h3> Le magasin est Fermé ! </h3>
                <?php endif; ?>
                <ul>
                    <?php foreach (DAYS as $k => $day) : ?>
                        <li <?php if ((int)date('N') === $k + 1) : ?> style="color:<?= $color ?>" <?php endif ?>>
                            <strong><?= $day ?> </strong>
                            <?php if (!(empty(CRENEAUX[$k]))) : ?>
                                <?= creneaux_html(CRENEAUX[$k]) ?>
                            <?php else : ?>
                                - Fermé
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
            </div>

            <!-- Formulaire -->
            <form method="GET">
                <select name="days">
                    <?php foreach (DAYS as $k => $day) : ?>
                        <option value="<?= $k ?>"><?= $day ?></option>
                    <?php endforeach; ?>
                </select>

                <select name="hours">
                    <?php for ($i = 0; $i <= 23; $i++) : ?>
                        <option value="<?= $i ?>"><?= $i ?> h</option>
                    <?php endfor; ?>
                </select>
                <button type="submit"> Est-ce que c'est ouvert ? </button>
            </form>
            <h2> <?= $msg ?></h2>
            </ul>
        </div>
    </div>
</div>

<?php require "../elems/footer.php"; ?>