<?php
session_start();
error_reporting(0);
//ini_set('error_reporting', E_ALL);
include('../includes/config.php');
if (strlen($_SESSION['recursos']) == 0) {
    header('location:index.php');
} else {
    $folio = $_GET["f"];

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <!-- Title -->
        <title>Recursos Materiales | Administrar Salidas</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

        <!-- Styles -->

        <link type="text/css" rel="stylesheet" href="../assets/css/responsive.dataTables.min.css" />
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css ">




        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />


    </head>

    <body>
        <?php include('includes/header.php'); ?>
        <?php include('includes/sidebar.php'); ?>
        <main class="mn-inner">
            <div class="row">
                <div class="col s12">
                    <div class="page-title">Administrar Salidas</div>
                </div>

                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Información salida de material</span>

                            <?php if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php } ?>
                            <div class="table-responsive">
                                <table id="example" class="cell-border display compact responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>FOLIO</th>
                                            <th>DESCRIPCION</th>
                                            <th>ENTREGA</th>
                                            <th>CANTIDAD</th>
                                            <th>FECHA</th>
                                            <th>SERIE</th>
                                            <th>QUIEN SOLICITA</th>
                                            <th>TESI</th>
                                            <th>COMENTARIO</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $sql = "SELECT * from  tblinventoryexit where folio='$folio' order by fecha desc";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {               ?>
                                                <tr>
                                                    <td> <?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->folio); ?></td>
                                                    <td><?php echo htmlentities($result->descripcion); ?></td>
                                                    <td><?php echo htmlentities($result->respuesta); ?></td>
                                                    <td><?php echo htmlentities($result->cantidad); ?></td>
                                                    <td><?php echo htmlentities($result->fecha); ?></td>
                                                    <td><?php echo htmlentities($result->serie); ?></td>
                                                    <td><?php echo htmlentities($result->tecnico); ?></td>
                                                    <td><?php echo htmlentities($result->tecnicoasig); ?></td>
                                                    <td><?php echo htmlentities($result->comentario); ?></td>
                                                    <td> <a name="create_pdf" href="#" onClick="mensaje(<?php echo htmlentities($result->empid); ?>,<?php echo htmlentities($result->id); ?>)" title="PDF RESPONSIVA" class="tooltipped" data-position="bottom" data-tooltip="PDF RESPONSIVA"><i class="material-icons">picture_as_pdf</i></a><a name="Responsiva" href="pdf_responsiva.php?empid=<?php echo htmlentities($result->empid); ?>&id=<?php echo htmlentities($result->id); ?>" target="_blank" title="Responsiva" class="tooltipped" data-position="bottom" data-tooltip="Responsiva"><i class="material-icons">picture_as_pdf</i></a>
                                                        <a name="eliminar registro" href="#" onClick="eliminar(<?php echo htmlentities($result->id); ?>)" title="eliminar registro" class="tooltipped" data-position="bottom" data-tooltip="eliminar registro"><i class="material-icons">delete_forever</i></a>
                                                    
                                                    </td>



                                                </tr>
                                        <?php $cnt++;
                                            }
                                        } ?>
                                    </tbody>
                                </table>
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
        <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            function mensaje(result,result2) {
                const {
                    value: contrato
                } = Swal.fire({
                    title: 'Selecciona tipo de responsiva',
                    input: 'select',
                    inputOptions: {
                        'Responsiva': {
                            'uniforme de gala': 'uniforme de gala',
                            'uniforme comando': 'uniforme comando',
                            'uniforme traje': 'uniforme traje',
                            
                        },
                    },
                    inputPlaceholder: 'Selecciona contrato',
                    showCancelButton: true,
                    inputValidator: (value) => {
                        return new Promise((resolve) => {
                            if (value === 'uniforme de gala') {
                                window.open('pdf_responsiva.php?empid='+result+'&id='+result2+'&responsiva='+value, '_blank');
                                swal.close()
                            }
                            if (value === 'uniforme comando') {
                                window.open('pdf_responsiva.php?empid='+result+'&id='+result2+'&responsiva='+value, '_blank');
                                swal.close()
                            }
                            if (value === 'uniforme traje') {
                                window.open('pdf_responsiva.php?empid='+result+'&id='+result2+'&responsiva='+value, '_blank');
                                swal.close()
                            }
                        })
                    }
                })
            }
        </script>

        <script>
            function eliminar(result) {


                var url = "ajax/deleteexit.php?del=" + result;
                var datos = result;
                //alert(datos);
                //return false;
                $.ajax({
                    type: "POST",
                    url: url,
                    data: datos,
                    beforeSend: function(b) {
                        if (b != 0) {
                            let timerInterval
                            Swal.fire({
                                title: '',
                                html: 'Se esta borrendo el registro !',
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading()
                                    timerInterval = setInterval(() => {
                                        const content = Swal.getContent()
                                        if (content) {
                                            const b = content.querySelector('b')
                                            if (b) {
                                                b.textContent = Swal.getTimerLeft()
                                            }
                                        }
                                    }, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            }).then((result) => {})
                        } else {

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'OCURRIO UN ERROR! 1',
                            })
                        }
                    },
                    success: function(r) {
                        if (r != 0) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'OCURRIO UN ERROR! 2',
                            })
                            location.reload(true);
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'REGISTRO BORRADO',
                                showConfirmButton: false,
                                timer: 2500
                            })
                            location.reload(true);
                        }
                    },
                    error: function(e) {
                        if (e != 0) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'No se ha podido borrar el registro',
                            })
                        }
                    },
                });
                return false;



            }
        </script>

    </body>

    </html>
<?php } ?>