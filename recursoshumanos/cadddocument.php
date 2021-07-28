<?php
session_start();
//error_reporting(0);

include('../includes/config.php'); 
        $did = intval($_GET['empid']);
        $eid =$_POST['empid'];
        $name = $_POST['name'];
		$rutax = '../Documentos/' . $name;
		if (!file_exists($rutax)) {
			mkdir($rutax, 0777, true);
		}
        

		$foto2 = $_FILES['foto2']['name'];
		if ($foto2 <> null) {
			$fecha2  = date("dmy");
			$no_aleatorio2  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta2 = '../Documentos/' . $name . '/' . $fecha2 . $no_aleatorio2 . $_FILES['foto2']['name']; //Acta de nacimiento
			opendir($ruta2);
			copy($_FILES['foto2']['tmp_name'], $ruta2);
			$nombre2 = $ruta2;
		}

		$foto3 = $_FILES['foto3']['name'];
		if ($foto3 <> null) {
			$fecha3  = date("dmy");
			$no_aleatorio3  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     	
			$ruta3 = '../Documentos/' . $name . '/' . $fecha3 . $no_aleatorio3 . $_FILES['foto3']['name']; //Comprobante de Domicilio
			opendir($ruta3);
			copy($_FILES['foto3']['tmp_name'], $ruta3);
			$nombre3 = $ruta3;
		}

		$foto4 = $_FILES['foto4']['name'];
		if ($foto4 <> null) {
			$fecha4  = date("dmy");
			$no_aleatorio4  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta4 = '../Documentos/' . $name . '/' . $fecha4 . $no_aleatorio4 . $_FILES['foto4']['name']; //CERTIFICADO DE ESTUDIOS
			opendir($ruta4);
			copy($_FILES['foto4']['tmp_name'], $ruta4);
			$nombre4 = $ruta4;
		}


		$foto5 = $_FILES['foto5']['name'];
		if ($foto5 <> null) {
			$fecha5  = date("dmy");
			$no_aleatorio5  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta5 = '../Documentos/' . $name . '/' . $fecha5 . $no_aleatorio5 . $_FILES['foto5']['name']; //Cartilla militar
			opendir($ruta5);
			copy($_FILES['foto5']['tmp_name'], $ruta5);
			$nombre5 = $ruta5;
		}


		$foto6 = $_FILES['foto6']['name'];
		if ($foto6 <> null) {
			$fecha6  = date("dmy");
			$no_aleatorio6  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta6 = '../Documentos/' . $name . '/' . $fecha6 . $no_aleatorio6 . $_FILES['foto6']['name']; //INE
			opendir($ruta6);
			copy($_FILES['foto6']['tmp_name'], $ruta6);
			$nombre6 = $ruta6;
		}

		$foto7 = $_FILES['foto7']['name'];
		if ($foto7 <> null) {
			$fecha7  = date("dmy");
			$no_aleatorio7  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta7 = '../Documentos/' . $name . '/' . $fecha7 . $no_aleatorio7 . $_FILES['foto7']['name']; //No. imss
			opendir($ruta7);
			copy($_FILES['foto7']['tmp_name'], $ruta7);
			$nombre7 = $ruta7;
		}


		$foto8 = $_FILES['foto8']['name'];
		if ($foto8 <> null) {
			$fecha8  = date("dmy");
			$no_aleatorio8  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta8 = '../Documentos/' . $name . '/' . $fecha8 . $no_aleatorio8 . $_FILES['foto8']['name']; //RFC
			opendir($ruta8);
			copy($_FILES['foto8']['tmp_name'], $ruta8);
			$nombre8 = $ruta8;
		}


		$foto9 = $_FILES['foto9']['name'];
		if ($foto9 <> null) {
			$fecha9  = date("dmy");
			$no_aleatorio9  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta9 = '../Documentos/' . $name . '/' . $fecha9 . $no_aleatorio9 . $_FILES['foto9']['name']; //Curp
			opendir($ruta9);
			copy($_FILES['foto9']['tmp_name'], $ruta9);
			$nombre9 = $ruta9;
		}

		$foto10 = $_FILES['foto10']['name'];
		if ($foto10 <> null) {
			$fecha10  = date("dmy");
			$no_aleatorio10  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta10 = '../Documentos/' . $name . '/' . $fecha10 . $no_aleatorio10 . $_FILES['foto10']['name']; //Antecedentes no penales
			opendir($ruta10);
			copy($_FILES['foto10']['tmp_name'], $ruta10);
			$nombre10 = $ruta10;
		}

		$foto11 = $_FILES['foto11']['name'];
		if ($foto11 <> null) {
			$fecha11  = date("dmy");
			$no_aleatorio11  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta11 = '../Documentos/' . $name . '/' . $fecha11 . $no_aleatorio11 . $_FILES['foto11']['name']; //No adeudo infonavit
			opendir($ruta11);
			copy($_FILES['foto11']['tmp_name'], $ruta11);
			$nombre11 = $ruta11;
		}

		$foto16 = $_FILES['foto16']['name'];
		if ($foto16 <> null) {
			$fecha16  = date("dmy");
			$no_aleatorio16  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta16 = '../Documentos/' . $name . '/' . $fecha16 . $no_aleatorio16 . $_FILES['foto16']['name']; //HUELLAS DACTILARES
			opendir($ruta16);
			copy($_FILES['foto16']['tmp_name'], $ruta16);
			$nombre16 = $ruta16;
		}

		$foto17 = $_FILES['foto17']['name'];
		if ($foto17 <> null) {
			$fecha17  = date("dmy");
			$no_aleatorio17  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta17 = '../Documentos/' . $name . '/' . $fecha17 . $no_aleatorio17 . $_FILES['foto17']['name']; //ESTUDIO SOCIOECONOMICO
			opendir($ruta17);
			copy($_FILES['foto17']['tmp_name'], $ruta17);
			$nombre17 = $ruta17;
		}

		$foto18 = $_FILES['foto18']['name'];
		if ($foto18 <> null) {
			$fecha18  = date("dmy");
			$no_aleatorio18  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta18 = '../Documentos/' . $name . '/' . $fecha18 . $no_aleatorio18 . $_FILES['foto18']['name']; //PSICOMETRIA
			opendir($ruta18);
			copy($_FILES['foto18']['tmp_name'], $ruta18);
			$nombre18 = $ruta18;
		}


		$foto20 = $_FILES['foto20']['name'];
		if ($foto20 <> null) {
			$fecha20  = date("dmy");
			$no_aleatorio20  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta20 = '../Documentos/' . $name . '/' . $fecha20 . $no_aleatorio20 . $_FILES['foto20']['name']; //MEDIO CUERPO
			opendir($ruta20);
			copy($_FILES['foto20']['tmp_name'], $ruta20);
			$nombre20 = $ruta20;
		}

		$foto21 = $_FILES['foto21']['name'];
		if ($foto21 <> null) {
			$fecha21  = date("dmy");
			$no_aleatorio21  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta21 = '../Documentos/' . $name . '/' . $fecha21 . $no_aleatorio21 . $_FILES['foto21']['name']; //CUERPO COMPLETO
			opendir($ruta21);
			copy($_FILES['foto21']['tmp_name'], $ruta21);
			$nombre21 = $ruta21;
		}

		$foto22 = $_FILES['foto22']['name'];
		if ($foto22 <> null) {
			$fecha22  = date("dmy");
			$no_aleatorio22  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta22 = '../Documentos/' . $name . '/' . $fecha22 . $no_aleatorio22 . $_FILES['foto22']['name']; //TOXICOLOGICO
			opendir($ruta22);
			copy($_FILES['foto22']['tmp_name'], $ruta22);
			$nombre22 = $ruta22;
		}

		$foto23 = $_FILES['foto23']['name'];
		if ($foto23 <> null) {
			$fecha23  = date("dmy");
			$no_aleatorio23  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta23 = '../Documentos/' . $name . '/' . $fecha23 . $no_aleatorio23 . $_FILES['foto23']['name']; //PERFIL IZQUIERDO
			opendir($ruta23);
			copy($_FILES['foto23']['tmp_name'], $ruta23);
			$nombre23 = $ruta23;
		}


		$foto24 = $_FILES['foto24']['name'];
		if ($foto24 <> null) {
			$fecha24  = date("dmy");
			$no_aleatorio24  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta24 = '../Documentos/' . $name . '/' . $fecha24 . $no_aleatorio24 . $_FILES['foto24']['name']; //PERFIL DERECHO
			opendir($ruta24);
			copy($_FILES['foto24']['tmp_name'], $ruta24);
			$nombre24 = $ruta24;
		}

		$foto25 = $_FILES['foto25']['name'];
		if ($foto25 <> null) {
			$fecha25  = date("dmy");
			$no_aleatorio25  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta25 = '../Documentos/' . $name . '/' . $fecha25 . $no_aleatorio25 . $_FILES['foto25']['name']; //CERTIFICADO MEDICO
			opendir($ruta25);
			copy($_FILES['foto25']['tmp_name'], $ruta25);
			$nombre25 = $ruta25;
		}

		$foto26 = $_FILES['foto26']['name'];
		if ($foto26 <> null) {
			$fecha26  = date("dmy");
			$no_aleatorio26  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta26 = '../Documentos/' . $name . '/' . $fecha26 . $no_aleatorio26 . $_FILES['foto26']['name']; //REFERENCIAS LABORALES
			opendir($ruta26);
			copy($_FILES['foto26']['tmp_name'], $ruta26);
			$nombre26 = $ruta26;
		}

		$foto27 = $_FILES['foto27']['name'];
		if ($foto27 <> null) {
			$fecha27  = date("dmy");
			$no_aleatorio27  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta27 = '../Documentos/' . $name . '/' . $fecha27 . $no_aleatorio27 . $_FILES['foto27']['name']; //CONSTANCIA FONACOT
			opendir($ruta27);
			copy($_FILES['foto27']['tmp_name'], $ruta27);
			$nombre27 = $ruta27;
		}

		$creatoruser = $_SESSION['recursos'];
		$action = 'inserción';

		$sql = "INSERT INTO tbldocument(idemp,name,namedoc,creatoruser,action)
VALUES(:eid,'ACTA DE NACIMIENTO',:nombre2,:creatoruser,:action),
      (:eid,'COMPROBANTE DE DOMICILIO',:nombre3,:creatoruser,:action),
	  (:eid,'CERTIFICADO DE ESTUDIOS',:nombre4,:creatoruser,:action),
	  (:eid,'CARTILLA MILITAR',:nombre5,:creatoruser,:action),
	  (:eid,'INE',:nombre6,:creatoruser,:action),
	  (:eid,'NUMERO DE SEGURIDAD SOCIAL',:nombre7,:creatoruser,:action),
	  (:eid,'RFC',:nombre8,:creatoruser,:action),
	  (:eid,'CURP',:nombre9,:creatoruser,:action),
	  (:eid,'ANTECEDENTES NO PENALES',:nombre10,:creatoruser,:action),
	  (:eid,'CONSTANCIA DE NO ADEUDO INFONAVIT',:nombre11,:creatoruser,:action),
	  (:eid,'HUELLAS DACTILARES',:nombre16,:creatoruser,:action),
	  (:eid,'ESTUDIO SOCIOECONOMICO',:nombre17,:creatoruser,:action),
	  (:eid,'PSICOMETRIA',:nombre18,:creatoruser,:action),
	  (:eid,'MEDIO CUERPO',:nombre20,:creatoruser,:action),
	  (:eid,'CUERPO COMPLETO',:nombre21,:creatoruser,:action),
	  (:eid,'TOXICOLOGICO',:nombre22,:creatoruser,:action),
	  (:eid,'PERFIL IZQUIERDO',:nombre23,:creatoruser,:action),
	  (:eid,'PERFIL DERECHO',:nombre24,:creatoruser,:action),
	  (:eid,'CERTIFICADO MEDICO',:nombre25,:creatoruser,:action),
	  (:eid,'REFERENCIAS LABORALES',:nombre26,:creatoruser,:action),
	  (:eid,'CONSTANCIA FONACOT',:nombre27,:creatoruser,:action)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':eid', $eid, PDO::PARAM_STR);
		$query->bindParam(':nombre2', $nombre2, PDO::PARAM_STR);
		$query->bindParam(':nombre3', $nombre3, PDO::PARAM_STR);
		$query->bindParam(':nombre4', $nombre4, PDO::PARAM_STR);
		$query->bindParam(':nombre5', $nombre5, PDO::PARAM_STR);
		$query->bindParam(':nombre6', $nombre6, PDO::PARAM_STR);
		$query->bindParam(':nombre7', $nombre7, PDO::PARAM_STR);
		$query->bindParam(':nombre8', $nombre8, PDO::PARAM_STR);
		$query->bindParam(':nombre9', $nombre9, PDO::PARAM_STR);
		$query->bindParam(':nombre10', $nombre10, PDO::PARAM_STR);
		$query->bindParam(':nombre11', $nombre11, PDO::PARAM_STR);
		$query->bindParam(':nombre16', $nombre16, PDO::PARAM_STR);
		$query->bindParam(':nombre17', $nombre17, PDO::PARAM_STR);
		$query->bindParam(':nombre18', $nombre18, PDO::PARAM_STR);
		$query->bindParam(':nombre19', $nombre19, PDO::PARAM_STR);
		$query->bindParam(':nombre20', $nombre20, PDO::PARAM_STR);
		$query->bindParam(':nombre21', $nombre21, PDO::PARAM_STR);
		$query->bindParam(':nombre22', $nombre22, PDO::PARAM_STR);
		$query->bindParam(':nombre23', $nombre23, PDO::PARAM_STR);
		$query->bindParam(':nombre24', $nombre24, PDO::PARAM_STR);
		$query->bindParam(':nombre25', $nombre25, PDO::PARAM_STR);
		$query->bindParam(':nombre26', $nombre26, PDO::PARAM_STR);
		$query->bindParam(':nombre27', $nombre27, PDO::PARAM_STR);
		$query->bindParam(':creatoruser', $creatoruser, PDO::PARAM_STR);
		$query->bindParam(':action', $action, PDO::PARAM_STR);
		$query->execute();
        
        $sql3 = "update tblemployees set visibility='1' where id=:eid";
		$query3 = $dbh->prepare($sql3);
        $query3->bindParam(':eid', $eid, PDO::PARAM_STR);
		$query3->execute();

        
		



?>