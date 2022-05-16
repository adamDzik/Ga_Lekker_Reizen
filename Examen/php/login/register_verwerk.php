<?php
// Voeg config bestand toe
include "../config/config.php";

// Definieer variabelen en initialiseer met lege waarden
$Studentnummer = $Naam = $Achternaam = $Email = $Wachtwoord = $confirm_Wachtwoord = "";
$Studentnummer_err = $Naam_err = $Achternaam_err = $Email_err = $Wachtwoord_err = $confirm_Wachtwoord_err = "";

// Formuliergegevens verwerken wanneer formulier wordt ingediend
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Valideer Studentnummer
    if(empty(trim($_POST["Studentnummer"]))){
        $Studentnummer_err = "Voer een studentnummer in.";
    } else{
        $Studentnummer = trim($_POST["Studentnummer"]);
    }

    // Valideer Naam
    if(empty(trim($_POST["Naam"]))){
        $Naam_err = "Voer je voornaam.";
    } else{
        $Naam = trim($_POST["Naam"]);
    }

    // Valideer Achternaam
    if(empty(trim($_POST["Achternaam"]))){
        $Achternaam_err = "Voer je achternaam in.";
    } else {
        $Achternaam = trim($_POST["Achternaam"]);
    }

    // Valideer Email
    if(empty(trim($_POST["Email"]))){
        $Email_err = "Voer een email in.";
    } else{

        // Bereid een select statement voor
        $sql = "SELECT Student_ID FROM Student WHERE Email = :Email";

        if($stmt = $pdo->prepare($sql)){
            // Bind variabelen aan de prepared statement als parameters
            $stmt->bindParam(":Email", $param_Email, PDO::PARAM_STR);

            // Stel parameters in
            $param_Email = trim($_POST["Email"]);

            // Poging om de prepared statement uit te voeren
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $Email_err = "Dit emailadres in al in gebruik.";
                } else{
                    $Email = trim($_POST["Email"]);
                }
            } else{
                echo "Oeps! Er is iets fout gegaan. Probeer het later opnieuw.";
            }

            // Sluit de statement
            unset($stmt);
        }
    }

    // Valideer wachtwoord
    if(empty(trim($_POST["Wachtwoord"]))){
        $Wachtwoord_err = "Voer een wachtwoord in.";
    } elseif(strlen(trim($_POST["Wachtwoord"])) < 6){
        $Wachtwoord_err = "Wachtwoord moet minimaal 6 tekens bevatten.";
    } else{
        $Wachtwoord = trim($_POST["Wachtwoord"]);
    }

    // Valideer wachtwoord bevestig
    if(empty(trim($_POST["confirm_Wachtwoord"]))){
        $confirm_Wachtwoord_err = "Bevestig je wachtwoord.";
    } else{
        $confirm_Wachtwoord = trim($_POST["confirm_Wachtwoord"]);
        if(empty($Wachtwoord_err) && ($Wachtwoord != $confirm_Wachtwoord)){
            $confirm_Wachtwoord_err = "Wachtwoord komt niet overeen.";
        }
    }

    // Controleer invoerfouten voordat u deze in de database invoegt
    if(empty($Studentnummer_err) && empty($Naam_err) && empty($Achternaam_err) && empty($Email_err) && empty($Wachtwoord_err) && empty($confirm_Wachtwoord_err)){

        // Bereid een insert statement voor
        $sql = "INSERT INTO Student (Studentnummer, Naam, Achternaam, Email, Wachtwoord) VALUES (:Studentnummer, :Naam, :Achternaam, :Email, :Wachtwoord)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variabelen aan de prepared statement als parameters
            $stmt->bindParam("Studentnummer", $param_Studentnummer, PDO::PARAM_STR);
            $stmt->bindParam("Naam", $param_Naam, PDO::PARAM_STR);
            $stmt->bindParam("Achternaam", $param_Achternaam, PDO::PARAM_STR);
            $stmt->bindParam(":Email", $param_Email, PDO::PARAM_STR);
            $stmt->bindParam(":Wachtwoord", $param_Wachtwoord, PDO::PARAM_STR);

            // Stel parameters in

            $param_Email = $Email;
            $param_Studentnummer = $Studentnummer;
            $param_Naam = $Naam;
            $param_Achternaam = $Achternaam;
            $param_Wachtwoord = password_hash($Wachtwoord, PASSWORD_DEFAULT); // Creates a password hash

            // Poging om de prepared statement uit te voeren
            if($stmt->execute()){
                // Verstuur naar de login pagina
                header("location: login.php");
            } else{
                echo "Oeps! Er is iets fout gegaan. Probeer het later opnieuw.";
            }

            // Sliuit de statement
            unset($stmt);
        }
    }

    // Sluit de connectie
    unset($pdo);
}
?>
