<?php
header('Content-Type: text/html; charset=utf-8');
// aloitetaan sessio
session_start();
// vaaditaan database.php tiedosto, jotta voidaan käyttää sen funktioita
require("database.php");

$_SESSION["topic_id"] = 1;
?>

<html>
<head>
    <title>Triathlon Foorumi</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="app.css">
</head>

<body>

<h1>Yleinen keskustelu</h1>


<a href="triforum.php" class="home">Etusivu</a>


<?php
    // lisätään viesti tietokantaan sekä foorumille ja sen mukana käyttäjän- ja aiheen tiedot (ownerId, topicId)
    echo '<h3><a href="lisaa_viesti.php?ownerId=' . $_SESSION["owner_id"] . '&topicId='. $_SESSION["topic_id"].'">Lisää viesti</a></h3>'; 
?>
<div>
    <table>
        <tr>
            <th>Aihe</th>
            <th>Pvm</th>
        </tr>

<?php
    try{
        // otetaan yhteys tietokantaan
        $conn = luoTietokantaYhteys();

        $lause = muodostaViestiHaku();
        $stmt = $conn->prepare($lause);

        $stmt->execute();
        $data = $stmt->fetchAll(); // array [][]muotoisena

        // näytetään viestin otsikko, luomispäivä ja viesti
        foreach($data as $row){
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<br/> <td>" . $row["created"] . "</td>";
            echo "</tr>";
            echo'<tr><td><input class="col1" type="text" readonly value="'.$row["message"].'" ></td></tr>';

            
        }

    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

?>        
</table>
</div>
</body>
</html>