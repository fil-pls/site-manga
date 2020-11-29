<?php

require_once '../model/manga.php';

header("Content-type: application/json");
echo json_encode(Manga::getAllMangas());