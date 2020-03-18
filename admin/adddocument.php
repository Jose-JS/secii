<?php
session_start();

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
//error_reporting(E_ALL);
 
// Motrar todos los errores de PHP
//ini_set('error_reporting', E_ALL);

include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
$eid=intval($_GET['empid']);    
$status=1;

$fecha2  = date("dmy");    
$no_aleatorio2  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios     
$ruta2 ='../Documentos/'.$fecha2.$no_aleatorio2.$_FILES['foto2']['name'];//Acta de nacimiento
opendir($ruta2);
copy($_FILES['foto2']['tmp_name'],$ruta2);
$nombre2=$ruta2;      
    

$fecha3  = date("dmy");    
$no_aleatorio3  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios     
$ruta3 ='../Documentos/'.$fecha3.$no_aleatorio3.$_FILES['foto3']['name'];//Acta de nacimiento
opendir($ruta3);
copy($_FILES['foto3']['tmp_name'],$ruta3);
$nombre3=$ruta3;      


$fecha4  = date("dmy");    
$no_aleatorio4  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios     
$ruta4 ='../Documentos/'.$fecha4.$no_aleatorio4.$_FILES['foto4']['name'];//Acta de nacimiento
opendir($ruta4);
copy($_FILES['foto4']['tmp_name'],$ruta4);
$nombre4=$ruta4;          


$fecha5  = date("dmy");    
$no_aleatorio5  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios     
$ruta5 ='../Documentos/'.$fecha5.$no_aleatorio5.$_FILES['foto5']['name'];//Cartilla militar
opendir($ruta5);
copy($_FILES['foto5']['tmp_name'],$ruta5);
$nombre5=$ruta5; 
    

$fecha6  = date("dmy");    
$no_aleatorio6  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios     
$ruta6 ='../Documentos/'.$fecha6.$no_aleatorio6.$_FILES['foto6']['name'];//INE
opendir($ruta6);
copy($_FILES['foto6']['tmp_name'],$ruta6);
$nombre6=$ruta6;          


$fecha7  = date("dmy");    
$no_aleatorio7  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios     
$ruta7 ='../Documentos/'.$fecha7.$no_aleatorio7.$_FILES['foto7']['name'];//No. imss
opendir($ruta7);
copy($_FILES['foto7']['tmp_name'],$ruta7);
$nombre7=$ruta7;            


$fecha8  = date("dmy");    
$no_aleatorio8  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios     
$ruta8 ='../Documentos/'.$fecha8.$no_aleatorio8.$_FILES['foto8']['name'];//RFC
opendir($ruta8);
copy($_FILES['foto8']['tmp_name'],$ruta8);
$nombre8=$ruta8;           


$fecha9  = date("dmy");    
$no_aleatorio9  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios     
$ruta9 ='../Documentos/'.$fecha9.$no_aleatorio9.$_FILES['foto9']['name'];//Curp
opendir($ruta9);
copy($_FILES['foto9']['tmp_name'],$ruta9);
$nombre9=$ruta9;          
    

$fecha10  = date("dmy");    
$no_aleatorio10  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios     
$ruta10 ='../Documentos/'.$fecha10.$no_aleatorio10.$_FILES['foto10']['name'];//Antecedentes no penales
opendir($ruta10);
copy($_FILES['foto10']['tmp_name'],$ruta10);
$nombre10=$ruta10;      


$fecha11  = date("dmy");    
$no_aleatorio11  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios     
$ruta11 ='../Documentos/'.$fecha11.$no_aleatorio11.$_FILES['foto11']['name'];//No adeudo infonavit
opendir($ruta11);
copy($_FILES['foto11']['tmp_name'],$ruta11);
$nombre11=$ruta11;           
    
$fecha16  = date("dmy");    
$no_aleatorio16  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios     
$ruta16 ='../Documentos/'.$fecha16.$no_aleatorio16.$_FILES['foto16']['name'];//No adeudo infonavit
opendir($ruta16);
copy($_FILES['foto16']['tmp_name'],$ruta16);
$nombre16=$ruta16;
    
$fecha17  = date("dmy");    
$no_aleatorio17  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios     
$ruta17 ='../Documentos/'.$fecha17.$no_aleatorio17.$_FILES['foto17']['name'];//No adeudo infonavit
opendir($ruta17);
copy($_FILES['foto17']['tmp_name'],$ruta17);
$nombre17=$ruta17;
    
$fecha18  = date("dmy");    
$no_aleatorio18  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios     
$ruta18 ='../Documentos/'.$fecha18.$no_aleatorio18.$_FILES['foto18']['name'];//No adeudo infonavit
opendir($ruta18);
copy($_FILES['foto18']['tmp_name'],$ruta18);
$nombre18=$ruta18;
    
$fecha19  = date("dmy");    
$no_aleatorio19  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios     
$ruta19 ='../Documentos/'.$fecha19.$no_aleatorio19.$_FILES['foto19']['name'];//No adeudo infonavit
opendir($ruta19);
copy($_FILES['foto19']['tmp_name'],$ruta19);
$nombre19=$ruta19;    

$sql="UPDATE tblemployees SET birthcertificate=:nombre2,docadress=:nombre3,docstudies=:nombre4,docmilitary=:nombre5,docine=:nombre6,docimss=:nombre7,docrfc=:nombre8,doccurp=:nombre9,docnocriminal=:nombre10,docdebtinfona=:nombre11,sheet1=:nombre16,sheet2=:nombre17,sheet3=:nombre18,sheet4=:nombre19 where id=:eid";
$query = $dbh->prepare($sql);  
$query->bindParam(':nombre2',$nombre2,PDO::PARAM_STR); 
$query->bindParam(':nombre3',$nombre3,PDO::PARAM_STR); 
$query->bindParam(':nombre4',$nombre4,PDO::PARAM_STR); 
$query->bindParam(':nombre5',$nombre5,PDO::PARAM_STR); 
$query->bindParam(':nombre6',$nombre6,PDO::PARAM_STR);     
$query->bindParam(':nombre7',$nombre7,PDO::PARAM_STR); 
$query->bindParam(':nombre8',$nombre8,PDO::PARAM_STR); 
$query->bindParam(':nombre9',$nombre9,PDO::PARAM_STR); 
$query->bindParam(':nombre10',$nombre10,PDO::PARAM_STR); 
$query->bindParam(':nombre11',$nombre11,PDO::PARAM_STR);
$query->bindParam(':nombre16',$nombre16,PDO::PARAM_STR);
$query->bindParam(':nombre17',$nombre17,PDO::PARAM_STR);
$query->bindParam(':nombre18',$nombre18,PDO::PARAM_STR);
$query->bindParam(':nombre19',$nombre19,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);  

$query->execute();
$lastInsertId = $dbh->lastInsertId();
    

$msg="Documentos de Técnico agregados con éxito";



}
    
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>Admin | Agregar Documentos</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <meta name="description" content="Responsive Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Steelcoders" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
    <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />


    <style type="text/css">
        #AUTO fieldset {
            display: none
        }

        #AUTO fieldset:first-child {
            display: block;
        }
    </style>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .div2 {
            border-style: solid;
            border-width: 1px;
            border-color: gainsboro
        }
    </style>
    <script type="text/javascript">
        function comprobar(checkbox) {
            otro = checkbox.parentNode.querySelector("[type=checkbox]:not(#" + checkbox.id + ")");

            if (otro.checked) {
                otro.checked = false;
            }
        }


        function valid() {

            var txtFoto2 = document.getElementById('foto2').value;
            var txtFoto4 = document.getElementById('foto4').value;
            var txtFoto6 = document.getElementById('foto6').value;
            var txtFoto7 = document.getElementById('foto7').value;
            var txtFoto8 = document.getElementById('foto8').value;
            var txtFoto10 = document.getElementById('foto10').value;
            var txtFoto16 = document.getElementById('foto16').value;
            var txtFoto17 = document.getElementById('foto17').value;
            var txtFoto18 = document.getElementById('foto18').value;
            var txtFoto19 = document.getElementById('foto19').value;


            if (txtFoto2 == null || txtFoto2 == 0) {
                // Si no se cumple la condicion...
                alert('[ERROR] Por favor seleccione docuemnto (acta de nacimiento)');
                return false;
            } else if (txtFoto6 == null || txtFoto6 == 0) {
                // Si no se cumple la condicion...
                alert('[ERROR] Por favor seleccione documento (INE o IFE)');
                return false;
            } else if (txtFoto7 == null || txtFoto7 == 0) {
                // Si no se cumple la condicion...
                alert('[ERROR] Por favor seleccione documento (No.IMSS)');
                return false;
            } else if (txtFoto10 == null || txtFoto10 == 0) {
                // Si no se cumple la condicion...
                alert('[ERROR] Por favor seleccione documento (Actecedentes No Penales)');
                return false;
            } else if (txtFoto4 == null || txtFoto4 == 0) {
                // Si no se cumple la condicion...
                alert('[ERROR] Por favor seleccione documento (Certificado de Estudios)');
                return false;
            } else if (txtFoto8 == null || txtFoto8 == 0) {
                // Si no se cumple la condicion...
                alert('[ERROR] Por favor seleccione documento (RFC)');
                return false;
            } else if (txtFoto16 == null || txtFoto16 == 0) {
                // Si no se cumple la condicion...
                alert('[ERROR] Por favor seleccione documento (HOJA 1)');
                return false;
            } else if (txtFoto17 == null || txtFoto17 == 0) {
                // Si no se cumple la condicion...
                alert('[ERROR] Por favor seleccione documento (HOJA 2)');
                return false;
            } else if (txtFoto18 == null || txtFoto18 == 0) {
                // Si no se cumple la condicion...
                alert('[ERROR] Por favor seleccione documento (HOJA 3)');
                return false;
            } else if (txtFoto19 == null || txtFoto19 == 0) {
                // Si no se cumple la condicion...
                alert('[ERROR] Por favor seleccione documento (HOJA 4)');
                return false;
            }
            return true;
        }
    </script>





    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".content").fadeOut(1500);
            }, 6000);

        });
    </script>
</head>

<body>
    <?php include('includes/header.php');?>

    <?php include('includes/sidebar.php');?>
    <main class="mn-inner">
        <div class="row">

            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">

                        <form id="AUTO" method="post" name="addemp" enctype="multipart/form-data">
                            <?php if($error){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                            <div>
                                <section>
                                    <div class="wizard-content">

                                        <h3> ARCHIVOS</h3>
                                        <hr style="border-color:black;">
                                        <h4> DOCUMENTOS</h4>

                                        <div class="row">
                                            <div class="col m6">
                                                <div class="row">

                                                    <div class="input-field col s12">
                                                        <label for="foto2">Acta de nacimiento</label><br><br>
                                                        <input id="foto2" name="foto2" type="file" maxlength="30" autocomplete="off" required>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <label for="foto3">Comprobante de domicilio</label><br><br>
                                                        <input id="foto3" name="foto3" type="file" maxlength="30" autocomplete="off">
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <label for="foto6">Ine o Ife</label><br><br>
                                                        <input id="foto6" name="foto6" type="file" maxlength="30" autocomplete="off" required>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <label for="foto7">No. imss</label><br><br>
                                                        <input id="foto7" name="foto7" type="file" maxlength="30" autocomplete="off" required>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <label for="foto10">Antecedentes no penales</label><br><br>
                                                        <input id="foto10" name="foto10" type="file" maxlength="30" autocomplete="off" required>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="col m6">
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <label for="foto4">Certificado de estudios</label><br><br>
                                                        <input id="foto4" name="foto4" type="file" maxlength="30" autocomplete="off" required>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <label for="foto5">Cartilla militar</label><br><br>
                                                        <input id="foto5" name="foto5" type="file" maxlength="30" autocomplete="off">
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <label for="foto8">Rfc</label><br><br>
                                                        <input id="foto8" name="foto8" type="file" maxlength="30" autocomplete="off" required>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <label for="foto9">Curp</label><br><br>
                                                        <input id="foto9" name="foto9" type="file" maxlength="30" autocomplete="off">
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <label for="foto11">No adeudo infonavit</label><br><br>
                                                        <input id="foto11" name="foto11" type="file" maxlength="30" autocomplete="off">
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <hr style="border-color:black;">
                                        <h4> HUELLAS DIGITALES</h4>

                                        <div class="row">
                                            <div class="col m6">
                                                <div class="row">

                                                    <div class="input-field col m6 s12">
                                                        <label for="foto16">Hoja 1</label><br><br>
                                                        <input id="foto16" name="foto16" type="file" maxlength="30" autocomplete="off" required>
                                                    </div>

                                                    <div class="input-field col m6 s12">
                                                        <label for="foto17">Hoja 2</label><br><br>
                                                        <input id="foto17" name="foto17" type="file" maxlength="30" autocomplete="off" required>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="col m6">
                                                <div class="row">
                                                    <div class="input-field col m6 s12">
                                                        <label for="foto18">Hoja 3</label><br><br>
                                                        <input id="foto18" name="foto18" type="file" maxlength="30" autocomplete="off" required>
                                                    </div>

                                                    <div class="input-field col m6 s12">
                                                        <label for="foto19">Hoja 4</label><br><br>
                                                        <input id="foto19" name="foto19" type="file" maxlength="30" autocomplete="off" required>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!--<input type="button" name="previous" class="previous btn btn-default" value="Anterior" /><br>-->
                                        <button type="submit" name="add" onclick="return valid();" id="add" class="waves-effect waves-light btn indigo m-b-xs">Guardar</button>
                                        </fieldset>
                                        	<button id="firmame">Firma</button>

                                </section>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="left-sidebar-hover"></div>

    <!-- Javascripts -->
    <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
    <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="../assets/js/alpha.min.js"></script>
    <script src="../assets/js/pages/form_elements.js"></script>

</body>

</html>
<?php } ?>