<?php
require_once('../vendor/autoload.php');
require_once('../recursoshumanos/credencial.php');

$css=file_get_contents('../style.css');
$mpdf= new \Mpdf\Mpdf([
      'mode' => 'utf-8'//,'format' => 'A4-L'
	//'mode' => 'utf-8', 'format' => [100,130]


]);
$mpdf->SetTitle('Credencial');
$content=getContent();
$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($content, \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output("Credencial.pdf","I");

?>
