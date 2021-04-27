<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
    require_once('../lib/tcpdf/config/lang/spa.php');
	require_once('../lib/tcpdf/tcpdf.php');
	require_once('conexion2.php');	
include('includes/config.php');
    $eid=intval($_GET['i']);
	$sql = "SELECT * FROM tblactadmin where id='$eid' ";	
	$query = $dbh -> prepare($sql);
$dbh ->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt=1;
if($query->rowCount() > 0)
{

	


        

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('JJSH');
$pdf->SetTitle('ACTA ADMINISTRATIVA');
$pdf->SetSubject('ACTA ADMINISTRATIVA');
$pdf->SetKeywords('Reporte, usuario, ACTA ADMINISTRATIVA, mysql');
$pdf->setPrintHeader(false); 
$pdf->setPrintFooter(false);
$image_file = K_PATH_IMAGES.'logo.png';
$pdf->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); 
    
    
	$pdf->SetMargins(3, 5, 3, false); 
	$pdf->SetAutoPageBreak(true, 10); 
	$pdf->SetFont('helvetica', '',8.5);
// set fill color



	$content = '';
	
	$content .= '<body>
            	';
	
	
	foreach($query as $result)
{ 
$date=$result['date'];
$reason=$result['reason'];
$technical=$result['technical'];
$turn=$result['turn'];
 $campus=$result['campus'];
        
$service=$result['service'];
$description=$result['description'];
$firm1=$result['firm1'];
$firm2=$result['firm2'];
$firm3=$result['firm3'];
$firm4=$result['firm4'];
$firm5=$result['firm5'];        
$empid=$result['empid'];
        
        

    $content .='<section >';
       
    $content .='<div align="left">';

        
       
    $content .='<table border="1" CELLPADDING="1" CELLSPACING="3" >';	
    
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>FICHA TECNICA</b></td>';
    $content .='</tr>';        
        
    $content .='<tr>';
    $content .='<td ROWSPAN="4" COLSPAN="1"align="center"><img src="'.$firm5.'" align="left" width="100" height="120"></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>MOTIVO:</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TECNICO:</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$reason.'</td>';
    $content .='<td colspan="2" align="center">'.$technical.'</td>';
    $content .='</tr>';
        
       
    
    $content .='<tr>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>FECHA</b></td>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>Turno</b></td>';
    $content .='</tr>';    
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$date.'</td>';
    $content .='<td colspan="2" align="center">'.$turn.'</td>';
    $content .='</tr>';
        
        
        
        
        
        
        
        
        
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>FICHA TECNICA</b></td>';
    $content .='</tr>';        
        
    $content .='<tr>';
    $content .='<td ROWSPAN="4" COLSPAN="1"align="center"><img src="'.$firm5.'" align="left" width="100" height="120"></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>MOTIVO:</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TECNICO:</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$reason.'</td>';
    $content .='<td colspan="2" align="center">'.$technical.'</td>';
    $content .='</tr>';
        
       
    
    $content .='<tr>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>FECHA</b></td>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>Turno</b></td>';
    $content .='</tr>';    
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$date.'</td>';
    $content .='<td colspan="2" align="center">'.$turn.'</td>';
    $content .='</tr>';$content .='<tr>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>FICHA TECNICA</b></td>';
    $content .='</tr>';        
        
    $content .='<tr>';
    $content .='<td ROWSPAN="4" COLSPAN="1"align="center"><img src="'.$firm5.'" align="left" width="100" height="120"></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>MOTIVO:</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TECNICO:</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$reason.'</td>';
    $content .='<td colspan="2" align="center">'.$technical.'</td>';
    $content .='</tr>';
        
       
    
    $content .='<tr>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>FECHA</b></td>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>Turno</b></td>';
    $content .='</tr>';    
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$date.'</td>';
    $content .='<td colspan="2" align="center">'.$turn.'</td>';
    $content .='</tr>';$content .='<tr>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>FICHA TECNICA</b></td>';
    $content .='</tr>';        
        
    $content .='<tr>';
    $content .='<td ROWSPAN="4" COLSPAN="1"align="center"><img src="'.$firm5.'" align="left" width="100" height="120"></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>MOTIVO:</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TECNICO:</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$reason.'</td>';
    $content .='<td colspan="2" align="center">'.$technical.'</td>';
    $content .='</tr>';
        
       
    
    $content .='<tr>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>FECHA</b></td>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>Turno</b></td>';
    $content .='</tr>';    
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$date.'</td>';
    $content .='<td colspan="2" align="center">'.$turn.'</td>';
    $content .='</tr>';$content .='<tr>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>FICHA TECNICA</b></td>';
    $content .='</tr>';        
        
    $content .='<tr>';
    $content .='<td ROWSPAN="4" COLSPAN="1"align="center"><img src="'.$firm5.'" align="left" width="100" height="120"></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>MOTIVO:</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TECNICO:</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$reason.'</td>';
    $content .='<td colspan="2" align="center">'.$technical.'</td>';
    $content .='</tr>';
        
       
    
    $content .='<tr>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>FECHA</b></td>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>Turno</b></td>';
    $content .='</tr>';    
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$date.'</td>';
    $content .='<td colspan="2" align="center">'.$turn.'</td>';
    $content .='</tr>';$content .='<tr>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>FICHA TECNICA</b></td>';
    $content .='</tr>';        
        
    $content .='<tr>';
    $content .='<td ROWSPAN="4" COLSPAN="1"align="center"><img src="'.$firm5.'" align="left" width="100" height="120"></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>MOTIVO:</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TECNICO:</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$reason.'</td>';
    $content .='<td colspan="2" align="center">'.$technical.'</td>';
    $content .='</tr>';
        
       
    
    $content .='<tr>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>FECHA</b></td>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>Turno</b></td>';
    $content .='</tr>';    
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$date.'</td>';
    $content .='<td colspan="2" align="center">'.$turn.'</td>';
    $content .='</tr>';$content .='<tr>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>FICHA TECNICA</b></td>';
    $content .='</tr>';        
        
    $content .='<tr>';
    $content .='<td ROWSPAN="4" COLSPAN="1"align="center"><img src="'.$firm5.'" align="left" width="100" height="120"></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>MOTIVO:</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TECNICO:</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$reason.'</td>';
    $content .='<td colspan="2" align="center">'.$technical.'</td>';
    $content .='</tr>';
        
       
    
    $content .='<tr>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>FECHA</b></td>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>Turno</b></td>';
    $content .='</tr>';    
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$date.'</td>';
    $content .='<td colspan="2" align="center">'.$turn.'</td>';
    $content .='</tr>';$content .='<tr>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>FICHA TECNICA</b></td>';
    $content .='</tr>';        
        
    $content .='<tr>';
    $content .='<td ROWSPAN="4" COLSPAN="1"align="center"><img src="'.$firm5.'" align="left" width="100" height="120"></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>MOTIVO:</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TECNICO:</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$reason.'</td>';
    $content .='<td colspan="2" align="center">'.$technical.'</td>';
    $content .='</tr>';
        
       
    
    $content .='<tr>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>FECHA</b></td>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>Turno</b></td>';
    $content .='</tr>';    
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$date.'</td>';
    $content .='<td colspan="2" align="center">'.$turn.'</td>';
    $content .='</tr>';$content .='<tr>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>FICHA TECNICA</b></td>';
    $content .='</tr>';        
        
    $content .='<tr>';
    $content .='<td ROWSPAN="4" COLSPAN="1"align="center"><img src="'.$firm5.'" align="left" width="100" height="120"></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>MOTIVO:</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TECNICO:</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$reason.'</td>';
    $content .='<td colspan="2" align="center">'.$technical.'</td>';
    $content .='</tr>';
        
       
    
    $content .='<tr>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>FECHA</b></td>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>Turno</b></td>';
    $content .='</tr>';    
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$date.'</td>';
    $content .='<td colspan="2" align="center">'.$turn.'</td>';
    $content .='</tr>';    
        
        
        
        
    
        
        
        
	}
	
	$content .= '</table>';
    $content .='</div>';
    $content .='</section>';

    $cnt++;} 

	//$content .= '
		//<div class="row padding">
        //	<div class="col-md-12" style="text-align:center;">
          //  	<span>Pdf Creator </span><a>By sistema sim</a>
            $content .= '</div>
        </div></body>
    	
	';
      	$pdf->addPage(); 
	//ob_end_clean(); //ESTA LINEA SE COMENTA EN PRODUCCION//
    //$pdf->Image('../lib/reportes/logopdf.png', 55, 90, 100, '', '', '', '', false, 300);
	$pdf->writeHTML($content, true, 0, true, 0);
    $pdf->Image('../lib/reportes/logopdf.png', 55, 90, 100, '', '', '', '', false, 300);
    

	$pdf->lastPage();


	$pdf->output('ActaAdministrativa.pdf', 'I');


?>