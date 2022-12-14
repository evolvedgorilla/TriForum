<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
?>
<html>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="app.css">
    </head>
    <body>

    <h1>Lisää viesti</h1>



    <form method="POST" action="luo_viesti.php">
        <p><input placeholder="Otsikko" type="text" name="name" required></p>
        <p><input placeholder="Viesti" type="text" name="message" required></p>
        <!--haetaan get komennolla aiheID ja käyttäjän ID -->
        <p><input type="text" name="topic_id" hidden value=<?php echo $_GET["topicId"]; ?>></p>
        <p><input type="text" name="owner_id" hidden value=<?php echo $_GET["ownerId"]; ?>></p>
        <p><button type="submit">Lähetä</button</p>
    </form>
</body>
</html>