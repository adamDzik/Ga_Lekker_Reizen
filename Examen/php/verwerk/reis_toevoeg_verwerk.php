<?php
// Voeg config bestand toe
include "../config/config.php";

// Laat foutmeldingen zien.
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Definieer variabelen en initialiseer met lege waarden
$Omschrijving = $Begindatum = $Einddatum ="";
$Omschrijving_err = $Begindatum_err = $Einddatum_err = "";

// Formuliergegevens verwerken wanneer formulier wordt ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // Omschrijving valideren
    $input_Omschrijving = trim($_POST["Omschrijving"]);
    if(empty($input_Omschrijving)) {
        $Omschrijving_err = "Voer een Omschrijving in.";
    } else{
        $Omschrijving = $input_Omschrijving;
    }

    // Begindatum valideren
    $input_Begindatum= trim($_POST["Begindatum"]);
    if(empty($input_Begindatum)){
        $Begindatum_err = "Voer een Begindatum in.";
    } else{
        $Begindatum = $input_Gebruikersnaam;
    }

    // Einddatum valideren
    $input_Einddatum = trim($_POST["Einddatum"]);
    if (empty($input_Einddatum)){
        $Einddatum_err = "Voer een Einddatum in.";
    } else{
        $Einddatum = $input_Einddatum;
    }

    // Controleer invoerfouten voordat de data in de database ingevoegd word
    if(empty($Omschrijving_err) && empty($Begindatum_err) && empty($Einddatum_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO Reis (Omschrijving, Gebruikersnaam, Wachtwoord, Level) VALUES (:Email, :Gebruikersnaam, :Wachtwoord, :Level)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":Email", $param_Email);
            $stmt->bindParam(":Gebruikersnaam", $param_Gebruikersnaam);
            $stmt->bindParam(":Wachtwoord", $param_Wachtwoord);
            $stmt->bindParam(":Level", $param_Level);

            // Set parameters
            $param_Email = $Email;
            $param_Gebruikersnaam = $Gebruikersnaam;
            $param_Wachtwoord = $Wachtwoord;
            $param_Level = $Level;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: ../index.php");
                exit();
            } else{
                echo "Oops! Er is iets fout gegaan. Probeer het later opnieuw.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);
}
?>

