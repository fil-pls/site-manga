<?php

require_once '../model/Manga.php';

$nom = filter_input(INPUT_POST, "nom");
$libelle = filter_input(INPUT_POST, "libelle");
$nombreChapitre = filter_input(INPUT_POST, "nombreChapitre",FILTER_VALIDATE_INT);

if(!empty($nom) && !empty($libelle) && !empty($nombreChapitre))
{
    Manga::save($nom,$libelle,$nombreChapitre);
    echo json_encode([
        "erreur" => 0,
        "msg" => "le manga s'est bien enregistré"
    ],JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode([
        "erreur" => 1,
        "msg" => "pas enregistré"
    ],JSON_UNESCAPED_UNICODE);
}