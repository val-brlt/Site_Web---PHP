<?php

/* Regarde une variable proprement */
function dump($var): void
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

/* Créer un nouvel onglet dans la barre de navigation */
function add_navitem(string $page, string $txt): string
{
    $current = "";
    if ($_SERVER['SCRIPT_NAME'] === $page)
        $current = "current";
    return <<<HTML
        <a href="$page" class="items_nav  $current">$txt</a>
        HTML;
}

/* Ajouter un nouveau projet */
function add_project(string $title, string $img_name, string $link): string
{
    return <<<HTML
                        <div class="elem_item">
                            <div class="front">
                                    <img src="img/$img_name" />
                            </div>
                            <div class="overlay">
                                <p>$title</p>
                                <a href="$link">Lien du projet</a>
                            </div>
                        </div>
        HTML;
}

/* FONCTIONS COMPTEUR DE VUES */

/* Ajoute une vue + ajoute un fichier selon le jour */
function add_viewer(): void
{
    $file_name = date("Y-m-d") . " counter";
    $file = '..' . DIRECTORY_SEPARATOR . 'projects' . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . 'counter';
    $file_day = '..' . DIRECTORY_SEPARATOR . 'projects' . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR .  $file_name;
    add_view($file);
    add_view($file_day);
}
/* Ajoute une vue */
function add_view($file): void
{
    // récupere le contenu du fichier compteur
    $k = file_get_contents($file);
    $k++;
    // on le modifie dans le fichier compteur avex + 1
    file_put_contents($file, $k);
}
/* Récupère le nombre de vues */
function get_views(): int
{
    $file = '..' . DIRECTORY_SEPARATOR . 'projects' . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . 'counter';
    return file_get_contents($file);
}
/* Reset le nombre de vues */
function reset_views(): void
{
    $file = '..' . DIRECTORY_SEPARATOR . 'projects' . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . 'counter';
    file_put_contents($file, '0');
}


/* FONCTION CRENEAUX DATES */

function creneaux_html(array $creneaux)
{
    $res = [];
    foreach ($creneaux as $creneau) {
        $res[] = "de {$creneau[0]}h à {$creneau[1]}h";
    }

    return ' - ' . implode(' et ', $res);
}

function in_creneaux(int $hour, array $creneaux): bool
{
    foreach ($creneaux as $creneau) {
        if ($hour >= $creneau[0] && $hour < $creneau[1])
            return true;
    }
    return false;
}

/* FONCTION PANEL MULTICHOIX */

function add_price(array $array, float $price): float
{
    foreach ($array as $id)
        $price += $id;
    return $price;
}

function is_checked(array $array, string $value)
{
    foreach ($array as $array2) {
        foreach ($array2 as $id) {
            if ($id === $value)
                echo 'checked';
        }
    }
}
