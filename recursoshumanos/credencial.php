<?php

function getContent(){
	
include('../includes/config.php');	
$ids=$_GET['idemp']; 
$eid=intval($_GET['empid']);

	
//CREDENCIAL OISME
if($ids=='OISME S.A. DE C.V.'){	
$sql = "SELECT * FROM tblemployees where id='$eid' ";	
$query = $dbh -> prepare($sql);
$dbh ->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt=1;
if($query->rowCount() > 0)
{
    foreach($query as $result)
{ 
$image=$result['id'];
$department=$result['Department'];
$name=$result['name'];
$firstname=$result['FirstName'];
$lastname=$result['LastName'];
$curp=$result['curp'];
$rfc=$result['rfc'];
$typeblood=$result['typeblood']; 		
$content = '';		
$hoy = date("j-n-Y"); 
//$nuevafecha = strtotime ( '+1 year' , strtotime ( $hoy ) ) ;
$nuevafecha= date('j-n-Y', strtotime('+6 month')) ;
//$nuevafecha = date ( 'j-n-Y' , $nuevafecha );		
$content .='

        <body >
		
        <div class="contenedor">
		<img src="../assets/images/CredencialFrenteOME.jpg" width="8.5cm" height="5.3cm">
		</div>';
		$sql22 = "SELECT * from  tbldocument where idemp='$eid' and name='MEDIO CUERPO'";
        $query22 = $dbh -> prepare($sql22);
        $dbh ->exec('SET CHARACTER SET utf8');
        $query22->execute();
        if($query22->rowCount() > 0)
        {
        foreach($query22 as $result22)
        {   
	    $namedoc=$result22['namedoc']; 
	
	    $content .='<div class="imgg"><img src="'.$namedoc.'"  width="74" height="89"/></div>'; 	
		}
		}
		$content .='<p class="p1"><b>'.$department.'</b></p>';
		$content .='<p class="p2"><b>'.$name.' '.$firstname.' '.$lastname.'</b></p>';
		$content .='<p class="p3">CURP: <b>'.$curp.'</b></p>';
		$content .='<p class="p4">RFC: <b>'.$rfc.'</b></p>';
		$content .='<p class="p5">TIPO DE SANGRE: <b>'.$typeblood.'</b></p>';
		$content .='<p class="p6">FECHA DE EMISION: <b>'.$hoy.'</b></p>';
		$content .='<p class="p7">FECHA DE VENCIMIENTO: <b>'.$nuevafecha.'</b></p>';
		$content .='<pagebreak>';//SALTO DE HOJA EN MPDF.
		$content .='
        <div class="contenedor">
		<img src="../assets/images/CredencialAtrasOME.jpg" width="8.5cm" height="5.3cm">
		</div>';
	
		
        }
        $cnt++;
        } 
$content .= '</body>';
}
	
//CREDENCIAL OIFSI	
if($ids=='OIFSI S.A. DE C.V.'){	
$sql = "SELECT * FROM tblemployees where id='$eid' ";	
$query = $dbh -> prepare($sql);
$dbh ->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt=1;
if($query->rowCount() > 0)
{
    foreach($query as $result)
{ 
$image=$result['id'];
$department=$result['Department'];
$name=$result['name'];
$firstname=$result['FirstName'];
$lastname=$result['LastName'];
$curp=$result['curp'];
$rfc=$result['rfc'];
$typeblood=$result['typeblood']; 		
$content = '';		
$hoy = date("j-n-Y"); 
//$nuevafecha = strtotime ( '+1 year' , strtotime ( $hoy ) ) ;
$nuevafecha= date('j-n-Y', strtotime('+6 month')) ;
//$nuevafecha = date ( 'j-n-Y' , $nuevafecha );		
$content .='

        <body >
		
        <div class="contenedoroifsi">
		<img src="../assets/images/Credenecial Oifsi Frente2.jpg" width="8.5cm" height="5.3cm">
		</div>';
		$sql22 = "SELECT * from  tbldocument where idemp='$eid' and name='MEDIO CUERPO'";
        $query22 = $dbh -> prepare($sql22);
        $dbh ->exec('SET CHARACTER SET utf8');
        $query22->execute();
        if($query22->rowCount() > 0)
        {
        foreach($query22 as $result22)
        {   
	    $namedoc=$result22['namedoc']; 
	
	    $content .='<div class="imgg2"><img src="'.$namedoc.'"  width="74" height="89"/></div>'; 	
		}
		}
		$content .='<p class="p8"><b>'.$department.'</b></p>';
		$content .='<p class="p9"><b>'.$name.' '.$firstname.' '.$lastname.'</b></p>';
		$content .='<p class="p10">CURP: <b>'.$curp.'</b></p>';
		$content .='<p class="p11">RFC: <b>'.$rfc.'</b></p>';
		$content .='<p class="p12">TIPO DE SANGRE: <b>'.$typeblood.'</b></p>';
		$content .='<p class="p13">FECHA DE EMISION: <b>'.$hoy.'</b></p>';
		$content .='<p class="p14">FECHA DE VENCIMIENTO: <b>'.$nuevafecha.'</b></p>';
		$content .='<pagebreak>';//SALTO DE HOJA EN MPDF.
		$content .='
        <div class="contenedoroifsi">
		<img src="../assets/images/Credenecial Oifsi Posterior.jpg" width="8.5cm" height="5.3cm">
		</div>';
	
		
        }
        $cnt++;
        } 
     	$content .= '</body>';
}	
	
//CREDENCIAL ASLO
if($ids=='ASLO SEGURIDAD PRIVADA S.A. DE C.V.'){	
$sql = "SELECT * FROM tblemployees where id='$eid' ";	
$query = $dbh -> prepare($sql);
$dbh ->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt=1;
if($query->rowCount() > 0)
{
    foreach($query as $result)
{ 
$image=$result['id'];
$department=$result['Department'];
        
$name=$result['name'];
$firstname=$result['FirstName'];
$lastname=$result['LastName'];
$curp=$result['curp'];
$rfc=$result['rfc'];
$typeblood=$result['typeblood']; 		
$content = '';		
$hoy = date("j-n-Y"); 
//$nuevafecha = strtotime ( '+1 year' , strtotime ( $hoy ) ) ;
$nuevafecha= date('j-n-Y', strtotime('+6 month')) ;
//$nuevafecha = date ( 'j-n-Y' , $nuevafecha );		
$content .='

        <body >
		
        <div class="contenedor">
		<img src="../assets/images/CredencialFrenteASLO2.jpg" width="8.5cm" height="5.3cm">
		</div>';
		$sql22 = "SELECT * from  tbldocument where idemp='$eid' and name='MEDIO CUERPO'";
        $query22 = $dbh -> prepare($sql22);
        $dbh ->exec('SET CHARACTER SET utf8');
        $query22->execute();
        if($query22->rowCount() > 0)
        {
        foreach($query22 as $result22)
        {   
	    $namedoc=$result22['namedoc']; 
	
	    $content .='<div class="imgg3"><img src="'.$namedoc.'"  width="74" height="89"/></div>'; 	
		}
		}
		$content .='<p class="p15"><b>'.$department.'</b></p>';
		$content .='<p class="p16"><b>'.$name.' '.$firstname.' '.$lastname.'</b></p>';
		$content .='<p class="p17">CURP: <b>'.$curp.'</b></p>';
		$content .='<p class="p18">RFC: <b>'.$rfc.'</b></p>';
		$content .='<p class="p19">TIPO DE SANGRE: <b>'.$typeblood.'</b></p>';
		$content .='<p class="p20">FECHA DE EMISION: <b>'.$hoy.'</b></p>';
		$content .='<p class="p21">FECHA DE VENCIMIENTO: <b>'.$nuevafecha.'</b></p>';
		$content .='<pagebreak>';//SALTO DE HOJA EN MPDF.
		$content .='
        <div class="contenedoroifsi">
		<img src="../assets/images/CredencialAtrasASLO.jpg" width="8.5cm" height="5.3cm">
		</div>';
	
		
        }
        $cnt++;
        } 
     	$content .= '</body>';
}	
	
//NO SE PUEDE GENERAR PDF	

	
	
		return $content;
	}
?>
