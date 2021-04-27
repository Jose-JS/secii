	
<?php 

	require "conexion.php";
    $eid=intval($_GET['empid']);
	class consulta{
		var $conn;
		var $conexion;
		function consulta(){		
			$this->conexion= new  Conexion();				
			$this->conn=$this->conexion->conectarse();
		}	
		function reportePdfUsuarios(){		
            $eid=intval($_GET['empid']);
			$html="";
			$sql="select * from tblemployees WHERE id='$eid' ";
			$rs=mysqli_query($this->conn,$sql);
			$i=0;
			$html=$html.'<div align="center">
			<h4>FICHA TECNICA.<h4/></div>
			<br /><br />			
			<table border="1" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			//$html=$html.'<tr bgcolor="#FF0000">
            //<td><font color="#FFFFFF">C&oacute;digo</font></td>
            //<td><font color="#FFFFFF">Nombres</font></td>
            //<td><font color="#FFFFFF">Apellidos</font></td>
            //<td><font color="#FFFFFF">Tel&eacute;fono</font></td>
            //<td><font color="#FFFFFF">foto</font></td></tr>';
       
            
			if($row = mysqli_fetch_array($rs) or die($myQuery."".mysql_error()))
                {
				if($i%2==0){
					
                    $html=$html.'<section >';
                     
                    
                    $html=$html.'<div align="left">';
                 
                    
                    
                    $html =$html.'<table border=".5" bordercolor="#0000CC" bordercolordark="#FF0000">';	
                    
                    $html =$html.'<tr>';
                    $html =$html.'<td rowspan="2" align="center"><img src="../'.$row['imagebody'].'" align="left" width="100" height="100"></td>';
                    $html =$html.'<td colspan="2"align="center"> <p style="font-weight: bold;">PUESTO</p>'.$row['Department'].'</td>';
                    $html =$html.'<td colspan="2"align="center"> <p style="font-weight: bold;">MATRICULA</p>'.$row['EmpId'].'</td>';
                    $html =$html.'</tr>';
                    $html =$html.'<tr>';
                    $html =$html.'<td colspan="2" align="center"><p style="font-weight: bold;">SERVICIO ASIGNADO</p>'.$row['assignedservice'].'</td>';
                    $html =$html.'<td colspan="2" align="center"><p style="font-weight: bold;">FECHA</p>'.$row['fechini'].'</td>';
                    $html =$html.'</tr>';
                   
                    $html =$html.'</table>';
                    $html=$html.'</div>';
         
                      $html=$html.'</section>';
                    $html=$html.'<tr>';
				}else{
                    $html=$html.'<tr>';
                      $html = $html.'<td>';
                      
                      $html = $html.'</td>';
					
				}
            
                $html = $html.'<td><p style="font-weight: bold;">NOMBRE</p>';
                $html = $html. $row["name"];
				$html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">APELLIDO PATERNO</p>';
				$html = $html. $row["FirstName"];
				$html = $html.'</td><td><p style="font-weight: bold;">APELLIDO MATERNO</p>';
				$html = $html. $row["LastName"];
				$html = $html.'</td><td><p style="font-weight: bold;">CORREO</p>';
				$html = $html.$row["EmailId"];
				$html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">GENERO</p>';
                $html = $html.$row["Gender"];
                $html = $html.'</td>';
                $html = $html.'</tr>';
                $html=$html.'<tr>';
              
                $html = $html.'<td><p style="font-weight: bold;">Dirección</p>';
                $html = $html.$row["Address"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Colonia</p>';
                $html = $html.$row["suburb"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Municipio</p>';
                $html = $html.$row["City"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Estado</p>';
                $html = $html.$row["Country"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Codigo postal</p>';
                $html = $html.$row["cp"];
                $html = $html.'</td>';
                $html = $html.'</tr>';
                
                
                $html=$html.'<tr>';
                $html = $html.'<td><p style="font-weight: bold;">Lugar de nacimiento</p>';
                $html = $html.$row["placebirth"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Fecha de nacimiento</p>';
                $html = $html.$row["Dob"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Edad</p>';
                $html = $html.$row["age"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Estado civil</p>';
                $html = $html.$row["marital"];
                $html = $html.'</td>';
                 $html = $html.'<td><p style="font-weight: bold;">Nacionalidad</p>';
                $html = $html.$row["nationality"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                
                
                $html=$html.'<tr>';
                $html = $html.'<td><p style="font-weight: bold;">Celular</p>';
                $html = $html.$row["Phonenumber"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Telefono local</p>';
                $html = $html.$row["phonelocal"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Telefono de recados</p>';
                $html = $html.$row["phonerecado"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Ife o ine</p>';
                $html = $html.$row["ife"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Curp</p>';
                $html = $html.$row["curp"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                
                
                
                $html=$html.'<tr>';
                $html = $html.'<td><p style="font-weight: bold;">Rfc</p>';
                $html = $html.$row["rfc"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">No. imss</p>';
                $html = $html.$row["imss"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Tipo de licencia</p>';
                $html = $html.$row["typelicence"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Cartilla Militar</p>';
                $html = $html.$row["military"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Dependientes</p>';
                $html = $html.$row["dependent"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                
                
                
                $html=$html.'<tr>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Nombre de dependiente</p>';
                $html = $html.$row["dependentname"];
                $html = $html.'</td>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Parentesco</p>';
                $html = $html.$row["dependentrelation"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">edad</p>';
                $html = $html.$row["dependentage"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                
                
                
                $html=$html.'<tr>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Nombre de dependiente</p>';
                $html = $html.$row["dependentname2"];
                $html = $html.'</td>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Parentesco</p>';
                $html = $html.$row["dependentrelation2"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Edad</p>';
                $html = $html.$row["dependentage2"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                
                
                $html=$html.'<tr>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Nombre de dependiente</p>';
                $html = $html.$row["dependentname3"];
                $html = $html.'</td>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Parentesco</p>';
                $html = $html.$row["dependentrelation3"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Edad</p>';
                $html = $html.$row["dependentage3"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                
                $html=$html.'<tr>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Nombre de dependiente</p>';
                $html = $html.$row["dependentname4"];
                $html = $html.'</td>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Parentesco</p>';
                $html = $html.$row["dependentrelation4"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Edad</p>';
                $html = $html.$row["dependentage4"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                
                $html=$html.'<tr>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Nombre de dependiente</p>';
                $html = $html.$row["dependentname5"];
                $html = $html.'</td>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Parentesco</p>';
                $html = $html.$row["dependentrelation5"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Edad</p>';
                $html = $html.$row["dependentage5"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                
                $html=$html.'<tr>';
                $html=$html.'<td colspan="5">';
                $html=$html.'<h2 style="font-weight: bold;">ESTUDIOS</h2>';
                $html=$html.'</td>';
                $html=$html.'</tr>';
                
                $html=$html.'<tr>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Nombre de la primaria</p>';
                $html = $html.$row["primaryname"];
                $html = $html.'</td>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Dirección de la primaria</p>';
                $html = $html.$row["primaryadress"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Documento obtenido</p>';
                $html = $html.$row["primarydocument"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                
                
                $html=$html.'<tr>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Nombre de la secundaria</p>';
                $html = $html.$row["highschoolname"];
                $html = $html.'</td>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Dirección de la secundaria</p>';
                $html = $html.$row["highschooladress"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Documento obtenido</p>';
                $html = $html.$row["highschooldocument"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                
                $html=$html.'<tr>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Nombre de la preparatoria</p>';
                $html = $html.$row["schoolname"];
                $html = $html.'</td>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Dirección de la preparatoria</p>';
                $html = $html.$row["schooladress"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Documento obtenido</p>';
                $html = $html.$row["schooldocument"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                
              
                
                $html=$html.'<tr>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Nombre de la universidad</p>';
                $html = $html.$row["universityname"];
                $html = $html.'</td>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Dirección de la universidad</p>';
                $html = $html.$row["universityadress"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Documento obtenido</p>';
                $html = $html.$row["universitydocument"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                
                $html=$html.'<tr>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Nombre de la compania</p>';
                $html = $html.$row["companyname"];
                $html = $html.'</td>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Dirección de la compania</p>';
                $html = $html.$row["companyadress"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Telefono de la compania</p>';
                $html = $html.$row["companyphone"];
                $html = $html.'</td>';
                $html=$html.'</tr>';       
                
                
                $html=$html.'<tr>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Puesto</p>';
                $html = $html.$row["companyjob"];
                $html = $html.'</td>';
                $html = $html.'<td><p style="font-weight: bold;">Tiempo laborando</p>';
                $html = $html.$row["timework"];
                $html = $html.'</td>';
                $html = $html.'<td colspan="2"><p style="font-weight: bold;">Razón de la salida</p>';
                $html = $html.$row["reasonexit"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["companyname2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["companyadress2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["companyphone2"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                
                
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["companyjob2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["timework2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["reasonexit2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["companyname3"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                
                
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["companyadress3"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["companyphone3"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["companyjob3"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["timework3"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["reasonexit3"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["familyname"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["relationship"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["yearshim"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["familyphone"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["familyname2"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["relationship2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["yearshim2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["familyphone2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["personalname"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["personalyears"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["personalphone"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["personaladress"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["personalname2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["personalyears2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["personalphone2"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["personaladress2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["previous"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["required"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["offered"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["homex1"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["homex2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["incomeextra"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["incomedesc"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["yearsliving"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["debts"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["debtscell"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["pantry"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["transport"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["maintenance"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["paymentschool"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["medicalservices"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["clothes"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["otherexpenses"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["overall"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["articulo"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["glasses"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["glasses2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["chronic"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["chronic2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["operation"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["operation2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["enervants"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["enervants2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["activities"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["people"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["valueperson"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["defect"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["sport"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["sport2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["politic"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["politic2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["syndicate"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["syndicate2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["conciliation"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["conciliation2"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["face"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["skincolor"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["eyecolor"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["kindeyes"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["haircolor"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["complexion"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["tattoo"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["tattoo2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["tattoo3"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["piercing"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["piercing2"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["piercing3"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["observations"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["weight"];
                $html = $html.'</td>';
                $html = $html.'<td>';
                $html = $html.$row["stature"];
                $html = $html.'</td>';
                $html=$html.'</tr>';
                $html=$html.'<tr>';
                $html = $html.'<td>';
                $html = $html.$row["typeblood"];
                $html = $html.'</td>';
                $html=$html.'</tr>';	
			$html=$html.'</table>';			
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------		
            }}

?>

