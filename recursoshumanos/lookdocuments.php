<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['recursos']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql = "delete from  tblincidents  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Registro de Incidencia eliminado";
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <!-- Title -->
        <title>Recursos Humanos | Documentos y Fotos del Técnico</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">


        <!-- Theme Styles -->
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
        <?php include('includes/header.php'); ?>

        <?php include('includes/sidebar.php'); ?>
        <main class="mn-inner">
            <div class="row">
                <div class="col s12">
                    <div class="page-title">Documentos e Imagenes de técnico</div>
                </div>






                <?php
                $id = $_GET['empid'];

                $sql = "SELECT * from tblemployees where EmpId=:id ";
                $query = $dbh->prepare($sql);
                $query->bindParam(':id', $id, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) {

                ?>
                        <div class="input-field col m6 s12">
                            <CENTER> ACTA DE NACIMIENTO</CENTER>
                            <iframe src="<?php echo htmlentities($result->birthcertificate); ?>" title="ACTA DE NACIMIENTO" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>

                        <div class="input-field col m6 s12">
                            <CENTER> COMPROBANTE DE DOMICILIO</CENTER>
                            <iframe src="<?php echo htmlentities($result->docadress); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>

                        <div class="input-field col m6 s12">
                            <CENTER> COMPROBANTE DE ESTUDIOS</CENTER>
                            <iframe src="<?php echo htmlentities($result->docstudies); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>
                        <div class="input-field col m6 s12">
                            <CENTER> CARTILLA MILITAR</CENTER>
                            <iframe src="<?php echo htmlentities($result->docmilitary); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>
                        <div class="input-field col m6 s12">
                            <CENTER> INE</CENTER>
                            <iframe src="<?php echo htmlentities($result->docine); ?>" width="500" height="500"></iframe>
                            <!--<embed src="<?php echo htmlentities($result->docine); ?>" type="application/pdf" width="100%" height="600px" />-->
                            <hr style="border-color:black;">
                        </div>
                        <div class="input-field col m6 s12">
                            <CENTER> NUMERO DE SEGURIDAD SOCIAL</CENTER>
                            <iframe src="<?php echo htmlentities($result->docimss); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>
                        <div class="input-field col m6 s12">
                            <CENTER> RFC </CENTER>
                            <iframe src="<?php echo htmlentities($result->docrfc); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>
                        <div class="input-field col m6 s12">
                            <CENTER> CURP</CENTER>
                            <iframe src="<?php echo htmlentities($result->doccurp); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>
                        <div class="input-field col m6 s12">
                            <CENTER> ANTECEDENTES NO PENAL</CENTER>
                            <iframe src="<?php echo htmlentities($result->docnocriminal); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>
                        <div class="input-field col m6 s12">
                            <CENTER> CREDITO INFONAVIT</CENTER>
                            <iframe src="<?php echo htmlentities($result->docdebtinfona); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>
                        <div class="input-field col m6 s12">
                            <CENTER> MEDIO CUERPO</CENTER>
                            <iframe src="<?php echo htmlentities($result->imagehalfbody); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>
                        <div class="input-field col m6 s12">
                            <CENTER> CUERPO COMPLETO</CENTER>
                            <iframe src="<?php echo htmlentities($result->imagebody); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>
                        <div class="input-field col m6 s12">
                            <CENTER> PERFIL IZQUIERDO</CENTER>
                            <iframe src="<?php echo htmlentities($result->imageleft); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>
                        <div class="input-field col m6 s12">
                            <CENTER> PERFIL DERECHO</CENTER>
                            <iframe src="<?php echo htmlentities($result->imageright); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>
                        <div class="input-field col m6 s12">
                            <CENTER> TOXICOLOGICO</CENTER>
                            <iframe src="<?php echo htmlentities($result->imagetoxi); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>
                        <div class="input-field col m6 s12">
                            <CENTER> HUELLAS DACTILARES</CENTER>
                            <iframe src="<?php echo htmlentities($result->sheet1); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>
                        <div class="input-field col m6 s12">
                            <CENTER> HUELLAS DACTILARES</CENTER>
                            <iframe src="<?php echo htmlentities($result->sheet2); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>
                        <div class="input-field col m6 s12">
                            <CENTER> HUELLAS DACTILARES</CENTER>
                            <iframe src="<?php echo htmlentities($result->sheet3); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>
                        <div class="input-field col m6 s12">
                            <CENTER> HUELLAS DACTILARES</CENTER>
                            <iframe src="<?php echo htmlentities($result->sheet4); ?>" width="500" height="500"></iframe>
                            <hr style="border-color:black;">
                        </div>



                <?php $cnt++;
                    }
                } ?>


            </div>
        </main>











        <div class="left-sidebar-hover"></div>

        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                setTimeout(function() {
                    $(".content").fadeOut(1500);
                }, 6000);

            });
        </script>
    </body>

    </html>
<?php } ?>