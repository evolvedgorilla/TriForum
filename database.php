<?php

require_once("env.php");


//aliohjelma, jonka avulla otetaan yhteys tietokantaan
function luoTietokantaYhteys() {
    global $DB_USERNAME, $DB_PASSWORD;
    try{
        $conn = new PDO("mysql:host=mysql.cc.puv.fi;dbname=e1900918_triforum;charset=utf8mb4",
        $DB_USERNAME,$DB_PASSWORD);

        return $conn;
    }
    catch(PDOException $exc){
        var_dump($exc);
    }
}
// haetaan viestit tietokannasta
function muodostaViestiHaku(){
    return "SELECT * FROM posts WHERE topic_id = 1 order by created ASC";
}

function muodostaViestiHakuUrheilu(){
    return "SELECT * FROM posts WHERE topic_id = 2 order by created ASC";
}
// haetaan aihe tietokannasta
function muodostaAiheHaku(){
    return "SELECT * FROM topic";
}




?>