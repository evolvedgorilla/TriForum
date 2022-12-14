<?php
session_start();
?>

<html>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="app.css">
    </head>
    <body>

        <h1>Kirjautuminen</h1>
        <!--Asetetaan scriptit joiden avulla voidaan evätä pääsy käyttäjältä, jos se ei ole tallennettuna sessiona -->
        <?php
                if(isset($_SESSION["login_error"]) === true){
                    echo "<p style='color:red'>" . $_SESSION["login_error"] . "</p>";
                }

            $_SESSION["login_error"] = null;
        ?>
        <!--Asetetaan sähköposti ja salasana tutkija, joka tutkii niiden oikeellisuuden ja ilmoittaa virheviestin jos ne eivät ole oikeellisia-->
        <form method="POST" action="kirjaudu.php">
            <p><input type="email" name="email" placeholder="Sähköposti" required></p>
            <?php
                if(isset($_SESSION["email_error"]) === true){
                    echo "<p style='color:red'>" . $_SESSION["email_error"] . "</p>";
                }

            $_SESSION["email_error"] = null;
            ?>
            <p><input type="password" name="password" placeholder="Salasana" required></p>
            <p><button type="submit">Kirjaudu</button></p>
        </form>
    </body>
</html>