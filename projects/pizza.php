<?php
require '../elems/header.php';
$lines = file(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'menu.tsv');
foreach ($lines as $k => $line) {
    $lines[$k] = explode("\t", trim($line));
}



/* Newsletter */
$name_file = date('Y-m-d');
$file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . $name_file;

if (isset($_POST["mail"])) {
    if (filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        file_put_contents($file, $_POST["mail"] . PHP_EOL, FILE_APPEND);
        $msg = "Votre mail a était ajouté à la newsletter !";
    } else
        $msg = "Veuillez entrer un mail valide !";
} else
    $msg = "";
?>

<div class="content">
    <div class="content_project">
        <div class="txt">
            <h1> Lecture d'un menu de Pizzeria et écriture d'email avec une newsletter </h1>
            <h3>
                Création d'un menu de pizzeria avec une lecture de fichiers<br>
                + Création d'un formulaire pour une newsletter et écriture <br>
                dans un fichier<br>
                <br>
                Contrainte Menu pizza:<br>
                - Mettre les titres en h2<br>
                - Mettre les noms des pizzas en gras<br>
                <a href="data/menu.tsv" >lien du fichier </a> <br> 
                <br>
                Contrainte Newsletter :<br>
                - Les mails sont enregistré dans un fichier par date<br>
                Nomenclature du fichier : AAAA - MM - JJ<br>
                -> Chaque fichier contiendra un email par jour<br>
                <a href="emails/<?= $name_file ?>" >lien du fichier </a> <br> 
                <br>
                Langage utilisés: PHP, HTML&CSS<br>
                Compétences: Lecture & écriture fichier<br>
            </h3>
        </div>

        <div class="news">
            <!-- Newsletters -->
            <h1> Newsletter </h1>
            <form method="POST">
                <label for="mail">Inscrivez vous à la newsletter : <br></label>
                <input type="text" id="mail" name="mail" placeholder="Entrez votre mail.." required>
                <button type="submit">Inscrivez-vous</button>
            </form>
            <h3> <?= $msg ?> </h3>

        </div>

        <div class="pizza">
            <!-- Menu pizzeria -->
            <h1> Menu </h1>
            <?php foreach ($lines as $line) : ?>
                <?php if (count($line) === 1) : ?>
                    <h2> <?= $line[0] ?> </h2>
                <?php else : ?>
                    <ul>
                        <div class="container">
                            <div class="container_elem">
                                <li><strong><?= $line[0] ?></strong><br>
                                    <?= $line[1] ?>
                            </div>
                            <div class="container_price">
                                <?= $line[2] ?> €</li>
                            </div>
                        </div>
                    </ul>
                <?php endif ?>
            <?php endforeach; ?>

        </div>

    </div>


</div>



<?php require '../elems/footer.php'; ?>