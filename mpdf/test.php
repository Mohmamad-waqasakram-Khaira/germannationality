<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$template  = @file_get_contents('voucher-html.php');
$mpdf->WriteHTML($template);
$mpdf->Output();