<?php

if (count($_POST) > 0) {
    if (preg_match('/[\r\n]/', $_POST['absender_name'])) {
        exit;
    }
    if (preg_match('/[\r\n]/', $_POST['absender_adresse'])) {
        exit;
    }

    $absenderAdresse = filter_var($_POST['absender_adresse'], FILTER_SANITIZE_EMAIL);

    $betreff = 'Nachricht von ' . $_POST['absender_name'] . ' (' . $absenderAdresse . ')';

    mail('seitenbetreiber@example.com', $betreff, $_POST['message']);

    header('Location: kontakt.php?ergebnis=erfolg');
    exit;
}

?>
<h1>Meine Website</h1>

<h2>Kontakt</h2>

<?php
if (isset($_GET['ergebnis']) && $_GET['ergebnis'] === 'erfolg') {
    echo '<p>Vielen Dank für Ihre Nachricht!</p>';
}
?>

<form action="" method="post">
    <label for="absender_adresse">Ihre E-Mail-Adresse:</label>
    <input type="text" name="absender_adresse" id="absender_adresse"/>
    <br>

    <label for="absender_name">Ihr Name:</label>
    <input type="text" name="absender_name" id="absender_name"/>
    <br>

    <label for="message">Ihre Nachricht an uns:</label>
    <textarea name="message" id="message" cols="30" rows="10"></textarea>
    <br>

    <input type="submit"/>
</form>
