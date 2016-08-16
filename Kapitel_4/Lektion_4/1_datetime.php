<?php

$datum = new DateTime();

var_dump(
    date('d.m.Y H:i:s')
);

var_dump(
    $datum->format('d.m.Y H:i:s')
);

var_dump($datum->getTimezone());

var_dump($datum->getTimestamp());