<?php

require __DIR__ . '/../vendor/autoload.php';

$pdfGenerator = new \MeineApp\PdfGenerator();
$pdfGenerator->sendePdf();

$mail = Swift_Message::newInstance();
$mail->setSubject('...');