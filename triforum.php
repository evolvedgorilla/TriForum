<?php
header('Content-Type: text/html; charset=utf-8');

// Aloitetaan sesssio
session_start();
require("database.php");

//Jos session owner id on väärä, ohjataan ulos sivulta
if(isset($_SESSION["owner_id"]) === false)
{
    header('Location: index.php', true, 301);
    exit;
}
?>

<html>
<head>
    <title>Triathlon Foorumi</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="app.css">
</head>

<body>

<h1>
<?php

    // Haetaan käyttäjän nimi SESSIOsta.
    echo "Hei, " . $_SESSION["owner_name"] . "! Tervetuloa TriathlonFoorumiin";


?>
</h1>

<div>
<a href="logout.php" class="close">Kirjaudu ulos</a>
</div>
<h2>Keskusteluaiheet</h2>
<div>
    <table>
        <tr>
            <th>Aihe</th>
            <th>Avaa</th>
        </tr>
<?php
    try{
        // otetaan yhteys tietokantaan
        $conn = luoTietokantaYhteys();
        //yhteys topic tauluun
        $lause = muodostaAiheHaku();
        $stmt = $conn->prepare($lause);

        $stmt->execute();
        $data = $stmt->fetchAll(); 

        foreach($data as $row){
            echo "<tr>";
            echo "<td>" . $row["subject"] . "</td>";
            // tarkistetaan aihe ja sen mukaan ohjataan oikealle sivustolle
            if($row["subject"] == "Yleinen"){
            echo "<td><a href='general.php?id=" . $row["topic_id"] . "'>";
            }
            else{
            echo "<td><a href='urheilu.php?id=" . $row["topic_id"] . "'>";
            }
            echo "<img class='nayta' src='open.svg'>";
            echo "</a></td></tr>";
        }
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>
    </table>
    
    <?php
        //lisää aihe foorumiin
        echo '<p><a href="lisaa_aihe.php?ownerId=' . $_SESSION["owner_id"] . '">Lisää aihe</a></p>';  
    ?>
</div>
</body>
</html>