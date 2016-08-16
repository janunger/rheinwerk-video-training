<?php

$klartextPasswort = 'geheim';

$hash = crypt($klartextPasswort, base64_encode($klartextPasswort));

echo $hash;