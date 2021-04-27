<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
$eid=intval($_GET['empid']);
if(isset($_POST['update']))
{

$fname=$_POST['firstName'];
$lname=$_POST['lastName'];   
$gender=$_POST['gender']; 
$dob=$_POST['dob']; 
$department=$_POST['department']; 
$address=$_POST['address']; 
$city=$_POST['city']; 
$country=$_POST['country']; 
$mobileno=$_POST['mobileno']; 
$creatoruser=$_SESSION['alogin'];
$action=modificación;        
$sql="update tblemployees set FirstName=:fname,LastName=:lname,Gender=:gender,Dob=:dob,Department=:department,Address=:address,City=:city,Country=:country,Phonenumber=:mobileno,creatoruser=:creatoruser,action=:action where id=:eid";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':department',$department,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':country',$country,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query -> bindParam(':creatoruser',$creatoruser, PDO::PARAM_STR);
$query -> bindParam(':action',$action, PDO::PARAM_STR);      
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$msg="Registro de empleado actualizado con éxito";
}

    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>Admin | Datos de Empleado</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <meta name="description" content="Responsive Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Steelcoders" />

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
    <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
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
    </style>

</head>

<body>
    <?php include('includes/header.php');?>
    <?php include('includes/sidebar.php');?>
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">
                    <h3>Datos de empleado</h3>
                </div>
            </div>

            <?php 
$eid=intval($_GET['empid']);
$sql = "SELECT * from  tblemployees where id=:eid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':eid',$eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>

            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <form id="example-form" method="post" name="updatemp">
                            <div>
                                <table id="example" class="display responsive-table dataTable">


                                    <tbody>
                                        <tr>
                                            <td><img id="foto" name="foto" width="120" height="120" autocomplete="off" src="<?php echo htmlentities($result->imagebody);?>" onclick="javascript:this.width=120;this.height=120" ondblclick="javascript:this.width=450;this.height=338" required> </td>
                                            <td><b>Matricula: </b><?php echo htmlentities($result->EmpId);?></td>
                                            <td><b>Fecha de incio:</b> <?php echo htmlentities($result->fechini);?></td>
                                            <td><b>Servicio asignado:</b> <?php echo htmlentities($result->assignedservice);?>
                                            </td>
                                            <td><b>Puesto:</b> <?php echo htmlentities($result->Department);?></td>

                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>


                                        <tr>
                                            <td><b>Domicilio:</b> <?php echo htmlentities($result->Address);?>&nbsp;<?php echo htmlentities($result->suburb);?>&nbsp;<?php echo htmlentities($result->City);?>&nbsp;<?php echo htmlentities($result->Country);?></td>
                                            <td><b>Código postal:</b> <?php echo htmlentities($result->cp);?></td>
                                            <td><b>Género:</b> <?php echo htmlentities($result->Gender);?></td>
                                            <td><b>Correo:</b> <?php echo htmlentities($result->EmailId);?></td>
                                            <td><b>Lugar de nacimiento:</b> <?php echo htmlentities($result->placebirth);?></td>

                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>

                                        <tr>
                                            <td><b>Fecha de nacimiento:</b> <?php echo htmlentities($result->Dob);?></td>
                                            <td><b>Edad:</b> <?php echo htmlentities($result->age);?></td>
                                            <td><b>Estado civil:</b> <?php echo htmlentities($result->marital);?></td>
                                            <td><b>Nacionalidad:</b> <?php echo htmlentities($result->nationality);?></td>
                                            <td><b>Celular:</b> <?php echo htmlentities($result->Phonenumber);?></td>
                                            <td><b>Numero local:</b> <?php echo htmlentities($result->phonelocal);?></td>
                                            <td><b>Numero de recados:</b> <?php echo htmlentities($result->phonerecado);?></td>

                                            <td>&nbsp;</td>
                                        </tr>

                                        <tr>
                                            <td><b>IFE o INE:</b> <?php echo htmlentities($result->ife);?></td>
                                            <td><b>Curp:</b> <?php echo htmlentities($result->curp);?></td>
                                            <td><b>RFC:</b> <?php echo htmlentities($result->rfc);?></td>
                                            <td><b>IMSS:</b> <?php echo htmlentities($result->imss);?></td>
                                            <td><b>Tipo de licencia:</b> <?php echo htmlentities($result->typelicence);?></td>
                                            <td><b>Cartilla militar:</b><?php echo htmlentities($result->military);?></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>




                                        <?php }}?>
                                    </tbody>
                                </table>
                                <button type="submit" name="update" id="update" class="waves-effect waves-light btn indigo m-b-xs">ACTUALIZAR</button>
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