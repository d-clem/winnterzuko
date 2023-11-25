<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Discographie</title>

    <link rel="stylesheet" href="../../style/all.css">

</head>
<body>
    
    <header id="header">
        <h1>Winnterzuko</h1>
        <hr>

        <nav>
            <a href="../index.html">
                Accueil
            </a>

            <a href="discographie.html">
                Discographie
            </a>

            <a href="">
                Titre aléatoire
            </a>

            <a href="#footer">
                Crédits
            </a>

        </nav>

        <hr>
    </header>


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

    ?>

    <br><br>

    <h3>
        Titres de Winnterzuko classés par popularité (Sur Deezer)
    </h3>

    <br><br>

    <div class="main-grid">
        
        <?php

        foreach ($liste_titres as $song) {
            echo $song->getHtml();
        }

        ?>
    </div>

    <br><br><br>

    <footer id="footer">

        <hr>

        <p>
            Site réalisé par un fan pour les fans.

        </p>

        <p>
            Crédits photos :             

            <a href="https://genius.com/artists/Winnterzuko/" target="_blank">
                Genius
            </a>

            &nbsp; | &nbsp;

            <a href="https://www.deezer.com/fr/artist/88895962" target="_blank">
                Deezer
            </a>
        </p>

        <p>
            Instagram : 
            <a href="https://www.instagram.com/winnterzuko/" target="_blank">
                Winnterzuko
            </a>
            
            &nbsp; | &nbsp;

            <a href="https://www.instagram.com/madou_treize/" target="_blank">
                Madou
            </a>

            &nbsp; | &nbsp;

            <a href="https://www.instagram.com/whosleoh/" target="_blank">
                Leoh
            </a>
        </p>

    </footer>

</body>
</html>