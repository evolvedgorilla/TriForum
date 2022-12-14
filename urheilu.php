<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
require("database.php");

$_SESSION["topic_id"] = 2;
?>

<html>
<head>
    <title>Triathlon Foorumi</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="app.css">
</head>

<body>

<h1>Urheilu</h1>

<a href="triforum.php" class="home">Etusivu</a>


<?php
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
        $conn = luoTietokantaYhteys();
        //Haetaan viestit urheilu topicistsa
        $lause = muodostaViestiHakuUrheilu();
        $stmt = $conn->prepare($lause);

        $stmt->execute();
        $data = $stmt->fetchAll(); 


        foreach($data as $row){
            echo "<tr>";
            //otsikko
            echo "<td>" . $row["name"] . "</td>";
            //Viestin luontipäivä
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