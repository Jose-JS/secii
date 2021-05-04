<?php
require_once('../vendor/autoload.php');
require_once('../cimo/pdfpat.php');
$DateAndTime = date('m-d-Y h:i:s a', time()); 
$css=file_get_contents('../cimo/styleformat.css');
$mpdf= new \Mpdf\Mpdf([
      'mode' => 'utf-8','format' => 'A4-L'
	//'mode' => 'utf-8', 'format' => [100,130]


]);
$mpdf->SetHTMLHeader('<div style="text-align: center; "><H3>FORMATO DE PATRULLAJE.</H3></div>', '0', false);
$mpdf->SetHTMLFooter('<div style="text-align: center;">{PAGENO}</div><div style="text-align: right;">{DATE j-m-Y h:i:s}</div>');
$mpdf->SetTitle('Formato de patrullaje');
$content=getContent();
$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($content, \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output("Formato de patrullaje.pdf","I");

?>
