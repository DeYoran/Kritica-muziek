<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/resources/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="/resources/css/jquery-ui.min.css" />
        <link rel="stylesheet" href="/resources/css/jquery-ui.structure.min.css" />
        <link rel="stylesheet" href="/resources/css/jquery-ui.theme.min.css" />
        <link rel="stylesheet" href="/resources/css/style1.css" />
        <script src="/resources/js/jquery-1.11.1.min.js"></script>
        <script src="/resources/js/jquery.dataTables.min.js"></script>
        <script src="/resources/js/jquery-ui.min.js"></script>
    </head>
    <body>
        <header>
            <a href="/"><h1>Kritica-muziek</h1></a>
            <?php 
                if(isset($_SESSION['kr-user']))
                {
                    ?>
                     <a id="uitlogknop" class="headerknop" href="/loguit">log uit</a>
                    <?php
                }
                else
                {
                    ?>
                     <a id="inlogknop" class="headerknop" href="/login">log in</a>
                     <a id="regisknop" class="headerknop" href="/registreer">registreer</a>
                    <?php
                }
                ?>
        </header>
        <section>
