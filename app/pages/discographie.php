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
            <a href="../index.php">
                Accueil
            </a>

            <a href="./discographie.php">
                Discographie
            </a>

            <a href="./random_song.php">
                Titre aléatoire
            </a>

            <a href="#footer">
                Crédits
            </a>

        </nav>

        <hr>
    </header>


    <a href="#header" id="up">
        <span class="fa fa-arrow-up"></span>

    </a>
    <br><br>

    <h3>
        Titres de Winnterzuko classés par popularité (Sur Deezer)
    </h3>
    <h5>
        Vous trouverez en
            <span class="green-text">&nbsp; VERT &nbsp;</span> 
        mes titres préférés
    </h5>

    <?php

    $liste_titres = array();

    try {
        $liste_titres = require "../utils/titles.php";
    } catch (Throwable $e) {
        echo "Désolé, une erreur est survenue lors du chargerment d'un fichier (titles.php)";
        echo $e->getMessage();
    }


    ?>

    

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
            Crédits audio :             

            <a href="https://www.deezer.com/fr/artist/88895962" target="_blank">
                Deezer
            </a>
        </p>

        <p>
            Crédits photos :             

            <a href="https://www.deezer.com/fr/artist/88895962" target="_blank">
                Deezer (Les covers des albums)
            </a>

            &nbsp; | &nbsp;

            <a href="https://www.pinterest.fr/Lrce303/" target="_blank">
                Lrce303 sur Pinterest (2eme image de présentation)
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