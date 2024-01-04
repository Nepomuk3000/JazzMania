<!DOCTYPE html>
<html>


<?php
include('scripts.php');
include('class/Playlist.php');
?>

<head>
    <meta charset="utf-8" />
    <meta name="noindex">
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <title>Jazz Mania - Playlist</title>

    <link rel="stylesheet" href="css/style.css" />
    <link href="skin/blue.monday/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />
    <style>
        .bouton {
            color: #666666;
            font-size: 10px;
            cursor: pointer;
        }

        .bouton:hover {
            text-decoration: underline;
        }

        .texte {
            padding: 10px;
            color: #333333;
            display: none;
        }

        #myTdm {
            color: #A00;
            font-style: italic;
            text-decoration: none;
        }

        #myTdm a {
            color: #A00;
            text-decoration: none;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="/audio/playerengine/initaudioplayer-1.css">

    <script>
        window.onload = function() {
            var div1 = document.getElementById('pour_tdm');
            var div1H1 = div1.querySelectorAll('h1,h2');
            var output = '<h1>Table des matières</h1>';
            output += '<ul id="myTdm">';
            for (var i = 0; i < div1H1.length; i++) {
                div1H1[i].setAttribute("id", i);
                if (div1H1[i].tagName == 'H2') {
                    output += '<ul>';
                }
                output += '<li><a href="#' +
                    i +
                    '">' +
                    div1H1[i].innerHTML.replace(/<a.*\a>/, "") +
                    '</a></li>';
                if (div1H1[i].tagName == 'H2') {
                    output += '</ul>';
                }
            }
            output += "</ul>";
            document.getElementById('tdm').innerHTML = output;
        }
    </script>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
    <script type="text/javascript" src="js/jplayer.playlist.min.js"></script>
    <script type="text/javascript">
        //<![CDATA[
        $(document).ready(function() {

            new jPlayerPlaylist({
                jPlayer: "#jquery_jplayer_1",
                cssSelectorAncestor: "#jp_container_1"
            }, [{
                    title: "The count is in",
                    mp3: "audio/The count is in.mp3",
                    oga: "audio/The count is in.ogg"
                },
                {
                    title: "Why don\'t you do right",
                    mp3: "audio/Why don\'t you do right.mp3",
                    oga: "audio/Why don\'t you do right.ogg"
                },
                {
                    title: "Smile",
                    mp3: "audio/Smile.mp3",
                    oga: "audio/Smile.ogg"
                },
                {
                    title: "Flight Of The Foo Birds",
                    mp3: "audio/Flight Of The Foo Birds.mp3",
                    oga: "audio/Flight Of The Foo Birds.ogg"
                },
                {
                    title: "Own up",
                    mp3: "audio/Own up.mp3",
                    oga: "audio/Own up.ogg"
                }
            ], {
                swfPath: "js",
                supplied: "oga, mp3",
                wmode: "window",
                smoothPlayBar: true,
                keyEnabled: true
            });
        });
        //]]>
    </script>
    <script src="/audio/playerengine/jquery.js"></script>
    <script src="/audio/playerengine/amazingaudioplayer.js"></script>
    <script src="/audio/playerengine/initaudioplayer-1.js"></script>
    <script src="http://www.youtube.com/player_api"></script>

</head>

<!--[if IE 6 ]><body class="ie6 old_ie"><![endif]-->
<!--[if IE 7 ]><body class="ie7 old_ie"><![endif]-->
<!--[if IE 8 ]><body class="ie8"><![endif]-->
<!--[if IE 9 ]><body class="ie9"><![endif]-->
<!--[if !IE]><!-->

<body>
    <!--<![endif]-->
    <?php include_once("analyticstracking.php") ?>
    <div id="bloc_page">
        <?php
        include('header.php');
        $msie = strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
        $firefox = strpos($_SERVER["HTTP_USER_AGENT"], 'Firefox') ? true : false;
        $safari = strpos($_SERVER["HTTP_USER_AGENT"], 'Safari') ? true : false;
        $chrome = strpos($_SERVER["HTTP_USER_AGENT"], 'Chrome') ? true : false;
        ?>


        <section class='articleAsideContener'>
            <article id="pour_tdm">
            <div id="tdm"></div>


            <?php

                $link = mysql_connect("localhost", "jazzmani", "FjyXCXRog");
                if (!$link) {
                    die('Could not connect: ' . mysql_error());
                }

                mysql_select_db('jazzmani') or die('Impossible de sélectionner la base de données');


                $playlist = new Playlist($link);

                echo '<h1><a name="lebigband"></a>Le Big Band</h1>';
                $playlist->showMusics("Big band");

                echo '<h1><a name="lejazztet"></a>Le Jazztet</h1>';
                $playlist->showMusics("Jazztet");
            ?>

            </article>
            <aside>
                <br />
                <div id="amazingaudioplayer-1" style="display:block;position:relative;width:200px;height:auto;margin:0px auto 0px;">
                    <ul class="amazingaudioplayer-audios" style="display:none;">
                        <li data-artist="" data-title="Round Midnight" data-album="" data-info="" data-image="" data-duration="165">
                            <div class="amazingaudioplayer-source" data-src="http://www.jazzmania.fr/audio/Round Midnight 1.mp3" data-type="audio/mpeg" />
                        </li>
                        <li data-artist="" data-title="No more blues" data-album="" data-info="" data-image="" data-duration="140">
                            <div class="amazingaudioplayer-source" data-src="http://www.jazzmania.fr/audio/No more blues 1.mp3" data-type="audio/mpeg" />
                        </li>
                        <li data-artist="" data-title="The Chicken" data-album="" data-info="" data-image="" data-duration="264">
                            <div class="amazingaudioplayer-source" data-src="http://www.jazzmania.fr/audio/The Chicken 1.mp3" data-type="audio/mpeg" />
                        </li>
                    </ul>
                    <div class="amazingaudioplayer-engine"><a href="http://amazingaudioplayer.com" title="jquery mp3 player">jquery audio player</a></div>
                </div>
            </aside>

        </section>



        <?php include('footer.php') ?>
    </div>
</body>

</html>