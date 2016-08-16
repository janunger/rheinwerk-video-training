<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<?php if (false): ?>
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
