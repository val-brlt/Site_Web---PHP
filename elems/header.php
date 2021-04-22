<?php
if (strpos($_SERVER['SCRIPT_NAME'], 'projects') !== false) {
    $path_function = '../functions/functions.php';
    $path_css = '../css/style.css';
    $path_css_projets = '<link rel="stylesheet" href="../css/style_projets.css">';
    $is_project = true;
} else {
    $path_function = 'functions/functions.php';
    $path_css = 'css/style.css';
    $path_css_projets = null;
    $is_project = false;
}
require_once $path_function;
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <?= $path_css_projets ?>
    <link rel="stylesheet" href="<?= $path_css ?>">
    <title> <?= isset($title) ? $title : "Valentin Brault"; ?> </title>
</head>

<body>
    <!-- Barre de navigation -->
    <div class="test">
        <input class="checkboxcheck" id="navi" name="menu" type="checkbox">
        <label for="navi" class="cliker"> Menu -> </label>
        <nav>
            <div class="nav">
                <?= add_navitem('/index.php', 'Moi') ?>
                <?= add_navitem('/portfolio.php', 'Portfolio') ?>
            </div>
            <div class="logo">
                <p> Valentin BRAULT </p>
            </div>
        </nav>
    </div>

