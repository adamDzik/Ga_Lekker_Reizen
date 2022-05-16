<?php
// Voeg config register_verwerk toe
include "../php/login/register_verwerk.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/stylesheet.css">
</head>
<body>
<div class="wrapper">
    <h2>Registreer</h2>
    <p>Maak een account aan.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Studentnummer</label>
            <input type="number" name="Studentnummer" class="form-control <?php echo (!empty($Studentnummer_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Studentnummer; ?>">
            <span class="invalid-feedback"><?php echo $Studentnummer_err; ?></span>
        </div>
        <div class="form-group">
            <label>voornaam</label>
            <input type="text" name="Naam" class="form-control <?php echo (!empty($Naam_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Naam; ?>">
            <span class="invalid-feedback"><?php echo $Naam_err; ?></span>
        </div>
        <div class="form-group">
            <label>Achternaam</label>
            <input type="text" name="Achternaam" class="form-control <?php echo (!empty($Achternaam_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Achternaam; ?>">
            <span class="invalid-feedback"><?php echo $Achternaam_err; ?></span>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="Email" name="Email" class="form-control <?php echo (!empty($Email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Email; ?>">
            <span class="invalid-feedback"><?php echo $Email_err; ?></span>
        </div>
        <div class="form-group">
            <label>Wachtwoord</label>
            <input type="password" name="Wachtwoord" class="form-control <?php echo (!empty($Wachtwoord_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Wachtwoord_err; ?>">
            <span class="invalid-feedback"><?php echo $Wachtwoord_err; ?></span>
        </div>
        <div class="form-group">
            <label>Bevestig Wachtwoord</label>
            <input type="password" name="confirm_Wachtwoord" class="form-control <?php echo (!empty($confirm_Wachtwoord_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_Wachtwoord; ?>">
            <span class="invalid-feedback"><?php echo $confirm_Wachtwoord_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-secondary ml-2" value="Reset">
        </div>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
</div>
</body>
</html>