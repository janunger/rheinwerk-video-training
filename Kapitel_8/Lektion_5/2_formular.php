<?php

if (isset($_POST['benutzername'])) {
    $benutzername = $_POST['benutzername'];
} else {
    $benutzername = '';
}

?>
<form action="" method="post">

    <!-- FALSCH!!! -->
    <input type="text" name="benutzername" value="<?= $benutzername; ?>"/>

    <!-- Richtig -->
    <input type="text" name="benutzername" value="<?= htmlspecialchars($benutzername); ?>"/>

    <input type="submit"/>
</form>
