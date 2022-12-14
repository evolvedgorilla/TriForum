<?php

require_once("database.php");


try{

    $conn = luoTietokantaYhteys();
    // lähetetään tiedot tietokantaan
    $lause = "INSERT INTO posts (`message`, `topic_id`,`user_id`, `name`, `created`) VALUES ('". $_POST["message"] ."' , ". $_POST["topic_id"] . ", ".$_POST["owner_id"].", '". $_POST["name"]."', '".  date("Y-m-d H:i:s") ."')";
    echo $lause;                                                                       
    $stmt = $conn->prepare($lause);
    
    $stmt->execute();


    //ohjataan käyttäjä takaisin viimeksi lukemaan foorumiin
    if ($_POST["topic_id"] == 1){
        header('Location: general.php?id='. $_POST["owner_id"], true, 301);
        exit;  
        }
        else if ($_POST["topic_id"] == 2){
        header('Location: urheilu.php?id='. $_POST["owner_id"], true, 301);
        exit;   
        } 


}
catch(PDOException $e){
    echo $e->getMessage();
}

