<?php

session_start();

$istEingabeFehlerhaft = false;

if (isset($_POST['benutzername'])) {
    if ($_POST['benutzername'] == 'max.muster' && $_POST['passwort'] == 'geheim') {
        $_SESSION['benutzername'] = 'max.muster';
        header('Location: privat.php');
        exit;
    } else {
        $istEingabeFehlerhaft = true;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<?php if ($istEingabeFehlerhaft): ?>
    <p>Die eingegebenen Zugangsdaten sind nicht korrekt.</p>
<?php endif; ?>

<form action="" method="post">
    <label for="benutzername">Benutzername</label>
    <input id="benutzername" name="benutzername" type="text"/><br>
    <label for="passwort">Passwort</label>
    <input id="passwort" name="passwort" type="password"/><br>
    <input type="submit"/>
</form>

</body>
</html>
