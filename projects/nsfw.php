<?php
$user = [
    'prenom' => 'John',
    'nom' => 'Doe',
    'age' => 18
];
require '../elems/header.php';
$succes = false;
$error = "";
if (isset($_COOKIE['age']))
    $succes = true;

if (isset($_POST['years'])) {
    if ($_POST['years'] <= 2003 && !(empty($_POST['years']))) {
        setcookie('age', $_POST['years']);
        $succes = true;
    } elseif ($_POST['years'] > 2003 && !(empty($_POST['years']))) {
        $error = "Vous n'avez pas l'âge autorisé pour accéder à ce site";
    }
}

/* Delete Cookie */
if(isset($_POST['cookie'])) {
    if($_COOKIE['age']) {
        setcookie('age');
        unset($_COOKIE['age']);
        header("Refresh:0");
    }
}

?>


<?php if ($succes === false) : ?>
    <div class="BG_popup">
        <div class=popup>
            <h2> Ce site est réservé au plus de 18 ans ! </h2>
            <h3> Veuillez rentrer votre année de naissance </h3>
            <form method="POST">
                <select name="years">
                    <?php for ($i = 2012; $i >= 1921; $i--) : ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor ?>
                </select>
                <button type="submit">Valider</button>
            </form>
            <h3> <?= $error ?> </h3>
        </div>
    </div>

<?php else : ?>
    <div class="content">
        <div class="txt">
            <h1> Création d'une sécurité -18 ans </h1>
            <h3>
                Création d'une sécurité -18 ans avec la gestion des cookies<br>
                <br>
                - Demander à l'user à sa date de naissance (2010-1919)<br>
                - Persister la date de naissance dans un cookies<br>
                - Si l'utilisateur est assez agé lui montrer le contenu<br>
                - Sinon on affiche un message d'erreur<br>
                <br>
                Langages utilisés: HTML&CSS, PHP<br>
                Compétences: Cookies PHP<br>

            </h3>
            <form method="POST">
                <input type="submit" name="cookie" value="Supprimer le cookie" />
            </form>
        </div>
    </div>
<?php endif ?>

<?php require '../elems/footer.php'; ?>