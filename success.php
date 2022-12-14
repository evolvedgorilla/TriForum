<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
require("database.php");

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
    try{
        echo "Hyviä uutisia " . $_SESSION["owner_name"] . "! Viesti tallennettiin onnistuneesti";

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>
</h1>

<div>
<a href="logout.php" class="close">Kirjaudu ulos</a>
</div>
<h2>Keskusteluaiheet</h2>
<div>

<?php
if ($_SESSION["topic_id"] == 1){
echo '<a href="general.php">Takaisin aiheeseen</a>';  
}
else if ($_SESSION["topic_id"] == 2){
echo '<a href="urheilu.php">Takaisin aiheeseen</a>';  
}
?>
</div>
</body>
</html>