<!DOCTYPE html>
<html>
<?php include('scripts.php') ?>


<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
define("BIG_BAND", 0);
define("SEPTET", 1);
define("BOTH", 2);

include("class/Date.php");
?>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/css/style.css" />
    <meta name="noindex">
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <title>Jazz Mania - Concerts</title>
</head>

<!--[if IE 6 ]><body class="ie6 old_ie"><![endif]-->
<!--[if IE 7 ]><body class="ie7 old_ie"><![endif]-->
<!--[if IE 8 ]><body class="ie8"><![endif]-->
<!--[if IE 9 ]><body class="ie9"><![endif]-->
<!--[if !IE]><!-->

<body><!--<![endif]-->
    <!--https://maps.google.fr/?ll=43.54076,5.021819&spn=1.71222,4.22699&t=h&z=9-->
    <!--
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '476763526458970',
      xfbml      : true,
      version    : 'v3.3'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/fr_FR/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
-->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-80213374-1', 'auto');
        ga('send', 'pageview');
    </script>
    <div id="bloc_page">

        <?php include('header.php') ?>
        </br></br>

        <h1>Prochains concerts</h1>
        <?php
        $dsn = "mysql:host=localhost;dbname=jazzmani";
        $pdo = new PDO($dsn, "jazzmani", "FjyXCXRog");
        $query = 'SELECT * FROM date WHERE date > NOW() ORDER BY date DESC';
        $result = $pdo->query($query);
        foreach ($result as $line) {
            $C = Concert::fromDB($line);
            $C->show();
        }
        ?>
        <div>
            <h1>Concerts passés</h1>
            <?php
            $query = 'SELECT * FROM date WHERE date <= NOW() ORDER BY date DESC';
            $result = $pdo->query($query);
            foreach ($result as $line) {
                $C = Concert::fromDB($line);
                $C->show();
            }
            ?>

            <h2>2018</h2>
            <ul style="color:#777777">
                <li id="dateImportante">08/12 - Concert de fin d'année à Salle Sévigné au profit du Téléthon <a href="presse.php#2018-12-08">(voir coupure de presse)</a></li>
                <li id="dateImportante">13/10 - Festival de la Confédération Musicale de France à Rognac</li>
                <li>21/06 - Fête de la musique à Espace Beaudoux à Lambesc</li>
                <li id="dateImportante">26/05 - Animation de la balade vigneronne des jaugeurs de Lirac à Saint-Laurent-des-Arbres</li>
            </ul>
            <h2>2017</h2>
            <ul style="color:#777777">
                <li id="dateImportante">16/12 - Concert de fin d'année à Salle Sévigné</li>
                <li id="dateImportante">18/11 - Première partie de l'harmonie d'Aix à Aix-en-Provence</li>
                <li id="dateImportante">14/10 - JazzMania rencontre Jazz'ier à Veauche (42) <a href="presse.php#2017-10-14">(voir coupure de presse)</a></li>
                <li id="dateImportante">23/09 - Concert Jazz'ier rencontre JazzMania à Saint Cannat Salle du 4 septembre</li>
                <li id="dateImportante">10/09 - Festival Jazz en Vendanges à Château Virant <a href="presse.php#2017-09-10">(voir coupure de presse)</a></li>
                <li>02/09 - Apéro-concert de la fête de Notre-Dame à Saint-Cannat</li>
                <li>21/06 - Fête de la Musique à Lambesc</li>
                <li>20/05 - Animation de la balade vigneronne des jaugeurs de Lirac à Lirac</li>
                <li id="dateImportante">25/03 - Hommage à Simon Peyre au bénéfice de l'institut Paoli Calmette à Salle Sévigné</li> <a href="presse.php#2017-03-25">(voir coupure de presse)</a></li>
            </ul>
            <h2>2016</h2>
            <ul style="color:#777777">
                <li id="dateImportante">17/12 - Concert de fin d'année à Salle Sévigné</li>
                <li>16/10 - Jazzmania aux Vendemiales De Saint Cannat à Saint-Cannat</li>
                <li id="dateImportante">01/10 - Festival de big bands de la CMF à Jas'Rod</li>
                <li>28/08 - Animation des Chikoulades à Lambesc</li>
                <li id="dateImportante">09/07 - Concert à Fox-Amphoux</li>
                <li id="dateImportante">21/05 - Concert dans le cadre de la balade vigneronne des jaugeurs de Lirac à Saint-Laurent-des-Arbres</li>
                <li>14/02 - Concert de la fête de la musique à Lambesc</li>
            </ul>
            <h2>2015</h2>
            <ul style="color:#777777">
                <li id="dateImportante">05/12 - Concert de fin d'année à Salle Sévigné</li>
                <li id="dateImportante">07/11 - Concert au profit du Secours Populaire à Salle Sévigné</li>
                <li id="dateImportante">17/10 - Concert à Salle Alain Ruault, La Barben</li>
                <li id="dateImportante">13/10 - Concert dans le cadre de la semaine bleue à Lambesc</li>
                <li id="dateImportante">26/09 - Jazz festival de big bands à Parc Bertoglio, Lambesc <a href="presse.php#2015-09-26">(voir coupure de presse)</a></li>
                <li id="dateImportante">05/09 - Jazz festival de big bands à Bibliothèque Méjanes</li>
                <li>30/08 - Animation des Chikoulades à Lambesc</li>
                <li id="dateImportante">18/07 - Jazz festival de big bands à Aubagne</li>
                <li id="dateImportante">20/06 - Jazz festival de big bands à Gardanne</li>
                <li>30/05 - Animation de la journée de découverte du domaine à Domaine de Lirac (Saint-Laurent-des-Arbres)</li>
                <li>11/04 - Master-Classe avec Nicolas Folmer à Imfp</li>
                <li id="dateImportante">28/02 - Concert pour le Téléthon à Entressen, Provence-Alpes-Cote D'Azur, France</li>
            </ul>
            <h2>2014</h2>
            <ul style="color:#777777">
                <li id="dateImportante">20/12 - Concert de fin d'année à Salle Sévigné</li>
                <li id="dateImportante">18/10 - Concert pour la semaine bleue à Salle Sévigné</li>
                <li>07/09 - Forum des associations à Lambesc</li>
                <li>31/08 - Fête des vendanges "les Chikoulades" à Lambesc</li>
                <li>17/07 - Animation du départ du convoi humanitaire du Crédit Agricole à Lambesc</li>
                <li>10/07 - Animation de la soirée de l'APAE à Salle Georges Duby (Eguilles)</li>
                <li id="dateImportante">29/06 - Concert à Garachon</li>
                <li>26/06 - Participation au concert de fin d'année de l'école de musique de Lambesc à Lambesc</li>
                <li id="dateImportante">21/06 - Concert pour la fête de la musique à Auberge Fugueirole (Lambesc)</li>
                <li>24/05 - Animation de la journée de découverte du domaine à Domaine de Lirac (Saint-Laurent-des-Arbres)</li>
                <li>17/05 - Animation de la fête de l'association des comercants à Place Gambetta, Saint-Cannat</li>
                <li>17/05 - Animation de l'apéritif de la fête du Jacquemard à Lambesc</li>
                <li id="dateImportante">26/04 - Concert à Salle Sévigné</li>
                <li id="dateImportante">07/02 - Concert organisée par le crédit agricole en faveur de l'institut Paoli Calmette à Garachon (Lambesc)</li>
            </ul>
            <h2>2013</h2>
            <ul style="color:#777777">
                <li id="dateImportante">21/12 - Concert de fin d'année à Salle Sévigné</li>
                <li id="dateImportante">08/12 - Concert dans le cadre du Téléthon à Salle Sévigné</li>
                <li id="dateImportante">26/10 - Concert dans le cadre de la semaine bleue à Salle Sévigné</li>
                <li>20/09 - Repas des commercants d'Eguilles à Salle Georges Duby (Eguilles)</li>
                <li>08/09 - Concert pour le forum des associations à Parvi de la mairie à Lambesc</li>
                <li id="dateImportante">06/07 - Concert à "la boite à musique" à Lambesc</li>
                <li>21/06 - Concert pour la fête de la musique à Rue Eugène Pelletan à Lambesc</li>
                <li id="dateImportante">08/06 - Concert dans le cadre de Marseille Provence 2013 à Rue Pauriol à Mallemort</li>
            </ul>

        </div>
        <?php include('footer.php') ?>
    </div>
</body>

</html>