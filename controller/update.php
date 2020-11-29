<?php

require_once '../model/Manga.php';

$nom = filter_input(INPUT_POST, "nom");
$nombreChapitre = filter_input(INPUT_POST, "nombreChapitre",FILTER_VALIDATE_INT);

if(!empty($nom) && !empty($nombreChapitre))
{
    Manga::updateNombre($nom,$nombreChapitre);
    echo json_encode([
        "erreur" => 0]
        ,JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode([
        "erreur" => 1]
        ,JSON_UNESCAPED_UNICODE);
}