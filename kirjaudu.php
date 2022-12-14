<?php

require("database.php");
session_start();

// Haetaaan lomakkeehen syötetyt sähköposti ja salasana

$email = $_POST["email"];
$pw = $_POST["password"];

$emailSanitized = filter_var($email, FILTER_SANITIZE_EMAIL);
$emailValid = filter_var($emailSanitized, FILTER_VALIDATE_EMAIL);
if($emailValid === false)
{
    // ei validi sposti
    // Ohjataan takaisin etusivulle
    // Näytetään virheviesti
    $_SESSION["email_error"] = "Sähköpostisoite on vääränlainen.";
    header('Location: index.php', true, 301);
    exit;
}



try{
    // Otetaan yhteys tietokantaan
    $conn = luoTietokantaYhteys();
    // haetaan users taulukosta käyttäjä jonka s-posti täsmää
    $lause = "SELECT * FROM users WHERE email='" . $email . "'";
    $stmt = $conn->prepare($lause);
    $stmt->execute();
    $data = $stmt->fetchAll(); 

    // s-posti täsmää
    if(count($data) === 1){
        // verrataan salasana
        $pwTietokannasta = $data[0]["password"]; // pitää valita ensimmäinen rivi [0], koska [][]array
        $name = $data[0]["name"]; // haetaan myös nimi
        $user_id = $data[0]["user_id"]; // haetaan tietokanta ID käyttäjälle
        if(strcmp($pwTietokannasta, $pw) === 0){
            // Salasana täsmää
            // Sallitaan pääsy sivustoon triforum

            //Tallennetaan käyttäjän tiedot istuntoon
            $_SESSION["owner_id"] = $user_id;
            $_SESSION["owner_name"] = $name;

            // Ohjataan eteenpäin
            header('Location: triforum.php?name=', true, 301);
            exit;
        }
        else{
            $_SESSION["login_error"] = "Väärä sposti ja salasana.";
            header('Location: index.php', true, 301);
            exit;
        }
    }
    else{
        $_SESSION["email_error"] = "Tiliä tällä sähköpostiosoitteella ei löydy.";
        header('Location: index.php', true, 301);
        exit;
        // Jos käyttäjä ei löydy, tai salasana väärä --> ohjataan kirjautumissivulle
    }

}
catch(PDOException $e){
    echo $e->getMessage();
}


?>