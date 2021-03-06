<?php
session_start();
error_reporting(0);
//error_reporting(E_ALL);

//ini_set('error_reporting', E_ALL);
include('../includes/config.php');
if (strlen($_SESSION['cliente']) == 0) {
    header('location:index.php');
} else {
    //$eid=intval($_GET['empid']);
    $imagePath = "";
    $res = $_SESSION['name'];
    $action = 'modificación';
    //var_dump("$res");
    if (!empty($_FILES)) {
        $fecha2  = date("dmy");
        $no_aleatorio2  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios   
        $imagePath = isset($_FILES["file"]["name"]) ? $_FILES["file"]["name"] : "Undefined";
        $targetPath = "../Documentos/" . $res . "/";
        $imagePath = $targetPath . $fecha2 . $no_aleatorio2 . $imagePath;
        $tempFile = $_FILES['file']['tmp_name'];

        $targetFile = $targetPath . $fecha2 . $no_aleatorio2  . $_FILES['file']['name'];

        $selectQuery = "select * from tbldocument where id='" . $_GET["image_id"] . "'";
        $query2 = $dbh->prepare($selectQuery);
        $query2->execute();
        $image = $query2->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query2->rowCount() > 0) {
            foreach ($image as $result) {
                //$resultSelectQuery = mysqli_query($conn, $selectQuery);
                //$image = mysqli_fetch_array($resultSelectQuery, MYSQLI_ASSOC);
                if (move_uploaded_file($tempFile, $targetFile)) {

                    // -----Para actualizar la carpeta necesitamos eliminar el archivo antiguo -----------------
                    if ($r = $result->namedoc) {
                        unlink($result->namedoc);
                        echo ("Error deleting $image");
                    } else {
                        echo ("Deleted $image");
                    }
                } else {
                    echo "false";
                }
            }
        }
    }

    if (!empty($_GET["action"]) && $_GET["action"] == "save") {
        $sql = "UPDATE tbldocument SET namedoc='" . $imagePath . "',creatoruser='" . $creatoruser . "',action='" . $action . "' WHERE id='" . $_GET["image_id"] . "'";
        $query = $dbh->prepare($sql);
        $query->bindParam(':eid', $eid, PDO::PARAM_STR);
        $query->bindParam(':imagePath', $imagePath, PDO::PARAM_STR);
        $query->bindParam(':creatoruser', $creatoruser, PDO::PARAM_STR);
        $query->bindParam(':action', $action, PDO::PARAM_STR);
        $query->execute();
        $message = "Record Modified Successfully";
    }


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <!-- Title -->
        <title>Cliente | Administrar Documentos</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../assets/plugins/dropzone/dropzone.css">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
        <script type="text/javascript" src="../assets/plugins/dropzone/dropzone.js"></script>


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
                    <div class="page-title">Modificar Documento</div>
                </div>

                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content">
                            <?php
                            $sql = "SELECT * FROM tbldocument WHERE id='" . $_GET["image_id"] . "'";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':eid', $eid, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {       ?>

                                    <span class="card-title">Documentos</span>
                                    <div class="box-preview">
                                        <iframe src="<?php echo htmlentities($result->namedoc); ?>" width="500" height="500"></iframe>
                                        <a target="_blank" href="<?php echo htmlentities($result->namedoc); ?>"><i class="material-icons">zoom_in</i></a>

                                        <a href="adddocument2.php?empid=<?php echo ($result->idemp); ?>&name=<?php echo htmlentities($_GET["name"]); ?>" class="link"><i class="material-icons">keyboard_return</i></a>

                                        <hr style="border-color:black;">
                                        <div class="preview-footer"><?php echo ($result->name); ?></div>
                                    </div>

                                   


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
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>

    </body>

    </html>
<?php }
                            }
                        } ?>