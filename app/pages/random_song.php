<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Titre aléatoire</title>

    <link rel="stylesheet" href="../../style/all.css">

</head>
<body>
    
    <header id="header">
        <h1>Winnterzuko</h1>
        <hr>

        <nav>
            <div>

                <a href="../index.php">
                    Accueil
                </a>

                <a href="./discographie.php">
                    Discographie
                </a>

                <a href="./random_song.php">
                    Titre aléatoire
                </a>
            </div>


            <a href="#footer">
                Crédits
            </a>

        </nav>

        <hr>
    </header>

    <br>

    
    <?php

    $liste_titres = array();

    try {
        $liste_titres = require "../utils/titles.php";
    } catch (Throwable $e) {
        echo "Désolé, une erreur est survenue lors du chargerment d'un fichier";
    }

    ?>
    

    <div class="grille-single">
        <h3>
            Titre aléatoire
        </h3>
        
        <?php

        $random_song = $liste_titres[array_rand($liste_titres)];

        echo $random_song->getHTML();

        ?>

    </div>

    <br>


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