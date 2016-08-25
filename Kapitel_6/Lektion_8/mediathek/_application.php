<?php

/**
 * @return PDO
 */
function holeDatenbankverbindung()
{
    return new PDO(
        'mysql:dbname=mediathek;host=localhost',
        'root',
        'root',
        [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
    );
}
