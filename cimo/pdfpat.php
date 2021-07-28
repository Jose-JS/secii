<?php
session_start();
error_reporting(0);
function getContent(){
	
include('../includes/config.php');	
$folio=$_GET['f']; 
$id=$_GET['id'];
//var_dump($folio);
	
//LISTA OISME

$content = '';				
$content .='<body>';	
    
    
$content .='<br><table class="compact responsive nowrap" width="100%">';
    
$sql = "SELECT * FROM tblformatpat where folio='$folio' order by id desc";	
$query = $dbh -> prepare($sql);
$dbh ->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt=1;
if($query->rowCount() > 0)
{
    foreach($query as $result)
{ 
$folio=$result['folio'];
$servicio=$result['servicio'];
$fecha=$result['fecha'];
$chofer=$result['chofer'];
$custodio=$result['custodio'];
$vehiculo=$result['vehiculo'];        
$horario=$result['horario'];        
$cargagas=$result['cargagas'];        
$kmini=$result['kmini'];        
$kmfin=$result['kmfin'];        
$kmreco=$result['kmreco'];        
$comini=$result['comini'];        
$comfin=$result['comfin'];        
$firma1=$result['firma1'];        
$firma2=$result['firma2'];                
$firma3=$result['firma3'];
$firma4=$result['firma4'];
$firma5=$result['firma5'];                
	$content.='

							<tbody>
								<tr>
                                    <td style="text-align: left; "><b>SERVICIO:</b> '.$servicio.'</td>
                                    <td style="text-align: left; "><b>HORARIO:</b> '.$horario.'</td>
                                    <td style="text-align: left; "><b>FECHA:</b> '.$fecha.'</td>
									<td style="text-align: left; "><b>FOLIO:</b><b style="color:#FF0000";>'.$folio.'</b></td>
									</tr>
								<tr>	
                                    <td style="text-align: left; "><b>CUSTODIO:</b> '.$custodio.'</td>
                                    <td style="text-align: left; "><b>CHOFER:</b> '.$chofer.'</td>
                                    <td style="text-align: left; "colspan="2"><b>VEHICULO:</b> '.$vehiculo.'</td>
                                    
                                    
								</tr>
							</tbody>'; 
$content.='	</table>';
	$content.='<br><table border="1" class="compact responsive nowrap" width="100%">

							<tbody>
								<tr>
                                    <td style="text-align: left; "><b>KM INICIO:</b><br> '.$kmini.'</td>
                                    <td style="text-align: left; "><b>KM FINAL:</b><br> '.$kmfin.'</td>
                                    <td style="text-align: left; "><b>KM RECORRIDOS:</b><br> '.$kmreco.'</td>
									<td style="text-align: left; "><b>COMBUSTIBLE INICIO:<br></b>'.$comini.'</td>
                                    <td style="text-align: left; "><b>COMBUSTIBLE FINAL:<br></b>'.$comfin.'</td>
                                    <td style="text-align: left; "><b>CARGA GASOLINA:</b><br>'.$cargagas.'</td>
									</tr>
							</tbody>';
	$cnt++;	
	}
        } 
					$content.='	</table>';    
    
    
$content .='<br>
		<table border="1" class="" width="100%">
		
							<thead>
								<tr><th>NO.</th>
									<th>NO. SUCURSAL</th>
									<th>HORA DE LLEGADA</th>
									<th>HORA DE SALIDA</th>
									<th>OBSERVACION</th>
                                    <th>FIRMA</th>
								</tr>
							</thead>';
$sql = "SELECT * FROM tblformatpatreg where folio='$folio' order by id desc";	
$query = $dbh -> prepare($sql);
$dbh ->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt=1;
if($query->rowCount() > 0)
{
    foreach($query as $result)
{ 
$nosucursal=$result['nosucursal'];
$hrllegada=$result['hrllegada'];
$hrsalida=$result['hrsalida'];
$observacion=$result['observacion'];
$firma=$result['firma'];
	$content.='

							<tbody>
								<tr>
									<td style="text-align: center; ">'.$cnt.'</td>
									<td style="text-align: left; ">'.$nosucursal.'</td>
									<td style="text-align: center; ">'.$hrllegada.'</td>
									<td style="text-align: center; ">'.$hrsalida.'</td>
                                    <td style="text-align: center; ">'.$observacion.'</td>
                                    <td style="text-align: center; "><img width="90" height="40" src="'.$firma.'" /></td>

								</tr>
							</tbody>';
	$cnt++;	
	}
        } 
					$content.='	</table>';

$content .= '</body>';
    
    
$content .='<table class="compact responsive nowrap" width="100%">';
    
$sql = "SELECT firma1,firma2,firma3,firma4,folio FROM tblformatpat where folio='$folio' order by id desc";	
$query = $dbh -> prepare($sql);
$dbh ->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt=1;
if($query->rowCount() > 0)
{
    foreach($query as $result)
{ 
        
$firma1=$result['firma1'];        
$firma2=$result['firma2'];                
$firma3=$result['firma3'];
$firma4=$result['firma4'];                
	$content.='

							<tbody>
								<tr>
                                    <td style="text-align: center; "><img style="text-align: center; " src="'.$firma1.'"/><br><b>FIRMA CUSTODIO</b></td>
                                    <td style="text-align: center; "><img style="text-align: center; " src="'.$firma2.'"/><br><b>FIRMA CHOFER</b> </td>
                                    <td style="text-align: center; "><img style="text-align: center; " src="'.$firma3.'"/><br><b>FIRMA CIMO</b></td>
									<td style="text-align: center; "><img style="text-align: center; " src="'.$firma4.'"/><br><b>FIRMA DIRECTOR OPERACIONES</b></td>
									</tr>
							</tbody>';
                            	$cnt++;	
	}
        } 
                            $content.='</table>'; 
     
	
	
	
		return $content;
	}
?>
