<!DOCTYPE html>
<html>


<?php
include('scripts.php');
include('class/Video.php');
?>

<head>
    <meta charset="utf-8" />
    <meta name="noindex">
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <title>Jazz Mania - Playlist</title>

    <link rel="stylesheet" href="css/style.css" />  
    <script src="http://www.youtube.com/player_api"></script>

</head>

<!--[if IE 6 ]><body class="ie6 old_ie"><![endif]-->
<!--[if IE 7 ]><body class="ie7 old_ie"><![endif]-->
<!--[if IE 8 ]><body class="ie8"><![endif]-->
<!--[if IE 9 ]><body class="ie9"><![endif]-->
<!--[if !IE]><!-->
<?
    $videos = 
        [
            new Video('It had to be you (Lambesc, 10/12/2023)',
                    'https://www.youtube.com/embed/C570gH90w1o'),
            new Video('Round Midnight (Rognac, 13/10/2018)',
                    'https://www.youtube.com/embed/CkQA-_rjfQM'),
            new Video('Fever (Rognac, 13/10/2018)',
                    'https://www.youtube.com/embed/qI3zonExEBw') 
        ]
?>

<body>
    <!--<![endif]-->
    <?php include_once("analyticstracking.php") ?>
    <div id="bloc_page">
        <?php include('header.php') ?>
        </br></br>

        <?
            foreach ($videos as $video) {
                $video->show();
            }
        ?>



        <?php include('footer.php') ?>
    </div>
</body>

</html>