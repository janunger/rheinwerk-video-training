<?php

function fakultaet($x)
{
    if (0 == $x) {
        return 1;
    }

    return $x * fakultaet($x - 1);
}

echo fakultaet(3);