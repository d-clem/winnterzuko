<?php

try {
    require "../utils/SongCard.php";
} catch (Throwable $e) {
    echo "Désolé, une erreur est survenue lors du chargerment d'un fichier";
}


// open the file data.json
$FILE_PATH = "../../static/data/data.json";

$liste_titres = array();

// read the file
try {
    $file_content = file_get_contents($FILE_PATH);
    
    // decode the file
    $json = json_decode($file_content, true);

    // create a SongCard for each song
    foreach ($json["TOP"]["data"] as $data_song) {
        $liste_titres[] = new SongCard($data_song);
    }

} catch (Throwable $e) {
    echo "Désolé, une erreur est survenue lors du chargerment d'un fichier";
}

return $liste_titres;