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

function holeLied($liedId)
{
    $db = holeDatenbankverbindung();
    $liedStatement = $db->prepare("
        SELECT 
            lieder.track,
            lieder.titel,
            cds.id AS cd_id,
            cds.name AS cdname,
            kuenstler.name AS kuenstlername
        FROM lieder
        LEFT JOIN cds ON lieder.cd_id = cds.id
        LEFT JOIN kuenstler ON cds.kuenstler_id = kuenstler.id
        WHERE lieder.id = :lied_id
    ");
    $liedStatement->execute(['lied_id' => $liedId]);

    return $liedStatement->fetch(PDO::FETCH_ASSOC);
}