<?php

require_once __DIR__ . '/vendor/autoload.php';

$nr_comanda= $_GET['nr_comanda'];
$id_client= $_GET["id_client"];



$mpdf= new \Mpdf\Mpdf();



// $h = file_get_contents('http://localhost/factura.php?nr_comanda='.$nr_comanda);

$url= file_get_contents("http://localhost/factura.php?nr_comanda=".$nr_comanda."&id_client=".$id_client);

// if (ini_get('allow_url_fopen')) {
//     $html=file_get_contents($url);

// } else {
//     $ch=curl_init($url);
//     curl_setopt($ch, CURLOPT_HEADER, );
//     curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , 1 );
//     $html=curl_exec($ch);
//     curl_close($ch);
// }

// $mpdf->SetDisplayMode('fullwidth');

// $mpdf->CSSselectMedia='mpdf'; // assuming you used this in the document header
// $mpdf->setBasePath($url);
$mpdf->WriteHTML($url);


$mpdf->Output('factura.pdf', 'D');
?>
