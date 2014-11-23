<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/resources/css/style1.css" />
    </head>
    <body>
        <header>
            <h1>Kritica-muziek</h1>
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
