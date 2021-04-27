<?php
session_start();
error_reporting(0);
function getContent(){
	
include('includes/config.php');	
$company=$_GET['company']; 
$eid=intval($_GET['empid']);
var_dump($company);
	
//LISTA OISME
if($company=='OISME S.A. DE C.V.'){	

$content = '';				
$content .='
        <body style="background: url(../assets/images/logot.png) no-repeat center;">
		<br>
		<table border="1" class="compact responsive nowrap" width="100%">
		
							<thead>
								<tr>
									<th>No.</th>
									<th>NOMBRE</th>
									<th>FECHA DE INGRESO</th>
									<th>EMPRESA</th>
								</tr>
							</thead>';
$sql = "SELECT * FROM tblemployees where company='$company' and Status=1 order by FirstName";	
$query = $dbh -> prepare($sql);
$dbh ->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt=1;
if($query->rowCount() > 0)
{
    foreach($query as $result)
{ 
$matricula=$result['EmpId'];
$company=$result['company'];
$name=$result['name'];
$firstname=$result['FirstName'];
$lastname=$result['LastName'];
$fechainicio=$result['fechini'];
	$content.='

							<tbody>
								<tr>
									<td style="text-align: center; ">'.$cnt.'</td>
									<td style="text-align: left; ">'.$firstname.' '.$lastname.' '.$name.'</td>
									<td style="text-align: center; ">'.$fechainicio.'</td>
									<td style="text-align: center; ">'.$company.'</td>

								</tr>
							</tbody>';
	$cnt++;	
	}
        } 
					$content.='	</table>';

$content .= '</body>';
}
//LISTA OIFSI
if($company=='OIFSI S.A. DE C.V.'){	

$content = '';				
$content .='
        <body>
		<br>
		<table border="1" class="compact responsive nowrap" width="100%">
		
							<thead>
								<tr>
									<th>No.</th>
									<th>NOMBRE</th>
									<th>FECHA DE INGRESO</th>
									<th>EMPRESA</th>
								</tr>
							</thead>';
$sql = "SELECT * FROM tblemployees where company='$company' and Status=1 order by FirstName";	
$query = $dbh -> prepare($sql);
$dbh ->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt=1;
if($query->rowCount() > 0)
{
    foreach($query as $result)
{ 
$matricula=$result['EmpId'];
$company=$result['company'];
$name=$result['name'];
$firstname=$result['FirstName'];
$lastname=$result['LastName'];
$fechainicio=$result['fechini'];
	$content.='

							<tbody>
								<tr>
									<td style="text-align: center; ">'.$cnt.'</td>
									<td style="text-align: left; ">'.$firstname.' '.$lastname.' '.$name.'</td>
									<td style="text-align: center; ">'.$fechainicio.'</td>
									<td style="text-align: center; ">'.$company.'</td>

								</tr>
							</tbody>';
	$cnt++;	
	}
        } 
					$content.='	</table>';

$content .= '</body>';
}
//LISTA APROSEMEX
if($company=='APROSEMEX S.A. DE C.V.'){	

$content = '';				
$content .='
        <body>
		<br>
		<table border="1" class="compact responsive nowrap" width="100%">
		
							<thead>
								<tr>
									<th>No.</th>
									<th>NOMBRE</th>
									<th>FECHA DE INGRESO</th>
									<th>EMPRESA</th>
								</tr>
							</thead>';
$sql = "SELECT * FROM tblemployees where company='$company' and Status=1 order by FirstName";	
$query = $dbh -> prepare($sql);
$dbh ->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt=1;
if($query->rowCount() > 0)
{
    foreach($query as $result)
{ 
$matricula=$result['EmpId'];
$company=$result['company'];
$name=$result['name'];
$firstname=$result['FirstName'];
$lastname=$result['LastName'];
$fechainicio=$result['fechini'];
	$content.='

							<tbody>
								<tr>
									<td style="text-align: center; ">'.$cnt.'</td>
									<td style="text-align: left; ">'.$firstname.' '.$lastname.' '.$name.'</td>
									<td style="text-align: center; ">'.$fechainicio.'</td>
									<td style="text-align: center; ">'.$company.'</td>

								</tr>
							</tbody>';
	$cnt++;	
	}
        } 
					$content.='	</table>';

$content .= '</body>';
}
	
//LISTA ASLO
if($company=='ASLO SEGURIDAD PRIVADA S.A. DE C.V.'){	

$content = '';				
$content .='
        <body>
		<br>
		<table border="1" class="compact responsive nowrap" width="100%">
		
							<thead>
								<tr>
									<th>No.</th>
									<th>NOMBRE</th>
									<th>FECHA DE INGRESO</th>
									<th>EMPRESA</th>
								</tr>
							</thead>';
$sql = "SELECT * FROM tblemployees where company='$company' and Status=1 order by FirstName";	
$query = $dbh -> prepare($sql);
$dbh ->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt=1;
if($query->rowCount() > 0)
{
    foreach($query as $result)
{ 
$matricula=$result['EmpId'];
$company=$result['company'];
$name=$result['name'];
$firstname=$result['FirstName'];
$lastname=$result['LastName'];
$fechainicio=$result['fechini'];
	$content.='

							<tbody>
								<tr>
									<td style="text-align: center; ">'.$cnt.'</td>
									<td style="text-align: left; ">'.$firstname.' '.$lastname.' '.$name.'</td>
									<td style="text-align: center; ">'.$fechainicio.'</td>
									<td style="text-align: center; ">'.$company.'</td>

								</tr>
							</tbody>';
	$cnt++;	
	}
        } 
					$content.='	</table>';

$content .= '</body>';
}
	
	
	
	
		return $content;
	}
 ?>