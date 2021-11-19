<?php
session_start();
//error_reporting(0);
include('../includes/config.php');
$folio = $_POST['folio'];
$fecha4 = $_POST['fecha'];
$hora = $_POST['hora'];
$tesientrega = $_POST['tesientrega'];
$lampara = $_POST['lampara'];
$fornitura = $_POST['fornitura'];
$pr24 = $_POST['pr24'];
$baston = $_POST['baston'];
$gas = $_POST['gas'];
$taser = $_POST['taser'];
$chamarra = $_POST['chamarra'];
$abrigo = $_POST['abrigo'];
$botas = $_POST['botas'];
$sombrilla = $_POST['sombrilla'];
$chaleco = $_POST['chaleco'];
$impermeable = $_POST['impermeable'];
$armacorta = $_POST['armacorta'];
$armalarga = $_POST['armalarga'];
$celular = $_POST['celular'];
$cargador1 = $_POST['cargador1'];
$garrafones = $_POST['garrafones'];
$trastes = $_POST['trastes'];
$servibar = $_POST['servibar'];
$parrilla = $_POST['parrilla'];
$microondas = $_POST['microondas'];
$radio = $_POST['radio'];
$cargador2 = $_POST['cargador2'];
$focos = $_POST['focos'];
$extintores = $_POST['extintores'];
$camaras = $_POST['camaras'];
$vidrios = $_POST['vidrios'];
$puertas = $_POST['puertas'];
$agua = $_POST['agua'];
$luz = $_POST['luz'];
$sede = $_POST['sede'];
$tesirecibe = $_POST['tesirecibe'];
$creatoruser = $_SESSION['tecnico'];
$action = 'inserción';

$img = $_POST['base64'];
$img = str_replace('data:image/png;base64,', '', $img);
$fileData = base64_decode($img);
$fileName = uniqid().'.png';
$fecha  = date("dmy");
$no_aleatorio  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta = '../firmas/'.$fecha.$no_aleatorio.$fileName;//firma entrega
opendir($ruta);
//copy($_FILES[$fileName.'']['tmp_name'],$ruta2);
$contract=$ruta;    
file_put_contents($ruta, $fileData);   


$img1 = $_POST['base641'];
$img1 = str_replace('data:image/png;base64,', '', $img1);
$fileData1 = base64_decode($img1);
$fileName1 = uniqid().'.png';
$fecha1  = date("dmy");
$no_aleatorio1  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta1 = '../firmas/'.$fecha1.$no_aleatorio1.$fileName1;//firma recibe
opendir($ruta1);
//copy($_FILES[$fileName.'']['tmp_name'],$ruta2);
$contract1=$ruta1;    
file_put_contents($ruta1, $fileData1);


$sql = "INSERT INTO tblentregaservtesi(folio,fecha,hora,tesientrega,tesirecibe,lampara,fornitura,pr24,baston,gas,taser,chamarra,abrigo,botas,sombrilla,chaleco,impermeable,armacorta,armalarga,celular,cargador1,garrafones,trastes,servibar,parrilla,microondas,radio,cargador2,focos,extintores,camaras,vidrios,puertas,agua,luz,creatoruser,action,sede,firmentrega,firmrecibe) VALUES (:folio,:fecha4,:hora,:tesientrega,:tesirecibe,:lampara,:fornitura,:pr24,:baston,:gas,:taser,:chamarra,:abrigo,:botas,:sombrilla,:chaleco,:impermeable,:armacorta,:armalarga,:celular,:cargador1,:garrafones,:trastes,:servibar,:parrilla,:microondas,:radio,:cargador2,:focos,:extintores,:camaras,:vidrios,:puertas,:agua,:luz,:creatoruser,:action,:sede,:contract,:contract1)";
$query = $dbh->prepare($sql);
$query->bindParam(':folio', $folio, PDO::PARAM_STR);
$query->bindParam(':fecha4', $fecha4, PDO::PARAM_STR);
$query->bindParam(':hora', $hora, PDO::PARAM_STR);
$query->bindParam(':tesientrega', $tesientrega, PDO::PARAM_STR);
$query->bindParam(':tesirecibe', $tesirecibe, PDO::PARAM_STR);
$query->bindParam(':lampara', $lampara, PDO::PARAM_STR);
$query->bindParam(':fornitura', $fornitura, PDO::PARAM_STR);
$query->bindParam(':pr24', $pr24, PDO::PARAM_STR);
$query->bindParam(':baston', $baston, PDO::PARAM_STR);
$query->bindParam(':gas', $gas, PDO::PARAM_STR);
$query->bindParam(':taser', $taser, PDO::PARAM_STR);
$query->bindParam(':chamarra', $chamarra, PDO::PARAM_STR);
$query->bindParam(':abrigo', $abrigo, PDO::PARAM_STR);
$query->bindParam(':botas', $botas, PDO::PARAM_STR);
$query->bindParam(':sombrilla', $sombrilla, PDO::PARAM_STR);
$query->bindParam(':chaleco', $chaleco, PDO::PARAM_STR);
$query->bindParam(':impermeable', $impermeable, PDO::PARAM_STR);
$query->bindParam(':armacorta', $armacorta, PDO::PARAM_STR);
$query->bindParam(':armalarga', $armalarga, PDO::PARAM_STR);
$query->bindParam(':celular', $celular, PDO::PARAM_STR);
$query->bindParam(':cargador1', $cargador1, PDO::PARAM_STR);
$query->bindParam(':garrafones', $garrafones, PDO::PARAM_STR);
$query->bindParam(':trastes', $trastes, PDO::PARAM_STR);
$query->bindParam(':servibar', $servibar, PDO::PARAM_STR);
$query->bindParam(':parrilla', $parrilla, PDO::PARAM_STR);
$query->bindParam(':microondas', $microondas, PDO::PARAM_STR);
$query->bindParam(':radio', $radio, PDO::PARAM_STR);
$query->bindParam(':cargador2', $cargador2, PDO::PARAM_STR);
$query->bindParam(':focos', $focos, PDO::PARAM_STR);
$query->bindParam(':extintores', $extintores, PDO::PARAM_STR);
$query->bindParam(':camaras', $camaras, PDO::PARAM_STR);
$query->bindParam(':vidrios', $vidrios, PDO::PARAM_STR);
$query->bindParam(':puertas', $puertas, PDO::PARAM_STR);
$query->bindParam(':agua', $agua, PDO::PARAM_STR);
$query->bindParam(':luz', $luz, PDO::PARAM_STR);
$query->bindParam(':sede', $sede, PDO::PARAM_STR);
$query->bindParam(':creatoruser', $creatoruser, PDO::PARAM_STR);
$query->bindParam(':action', $action, PDO::PARAM_STR);
$query->bindParam(':contract', $contract, PDO::PARAM_STR);
$query->bindParam(':contract1', $contract1, PDO::PARAM_STR);
if ($query->execute() == true) {
     $response_array['status'] = 'success';
} else {
    $response_array['status'] = 'error';

}
echo json_encode($response_array);
$query = null;
