<?php

try {
    require "../utils/SongCard.php";
} catch (Throwable $e) {
    echo "Désolé, une erreur est survenue lors du chargerment d'un fichier (SongCard.php)";
}


// open the file data.json
$FILE_PATH = "../../static/data/data_off.json";

$liste_titres = array();

// read the file
try {
    $file_content = file_get_contents($FILE_PATH);
    
    // decode the file
    $json = json_decode($file_content, true);

    // create a SongCard for each song
    foreach ($json as $data_song) {
        $liste_titres[] = new SongCard($data_song);
    }

} catch (Throwable $e) {
    echo "Désolé, une erreur est survenue lors du chargerment d'un fichier (data.json)";
}

return $liste_titres;