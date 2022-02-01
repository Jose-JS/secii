<?php
session_start();
error_reporting(0);
//ini_set('error_reporting', E_ALL);
include('../includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    // codigo para inactivar Técnico    
    if (isset($_GET['inid'])) {
        $id = $_GET['inid'];
        $status = 0;
        $sql = "update tblemployees set Status=:status  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        header('location:manageemployee.php');
    }



    //codigo para activar Técnico
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $status = 1;
        $sql = "update tblemployees set Status=:status  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        header('location:manageemployee.php');
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <!-- Title -->
        <title>Administración | Nómina ASLO</title>

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
        <style>
            div.container {
                max-width: 1200px
            }

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

            /*  .material-icons{
            color:darkcyan;
            font-size: 20px;

        }*/
        </style>

    </head>

    <body>
        <?php include('includes/header.php'); ?>
        <?php include('includes/sidebar.php'); ?>
        <main class="mn-inner">
            <div class="row">
                <div class="col s12">
                    <div class="page-title">Nómina ASLO</div>
                </div>

                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">A S L O</span>

                            <?php if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php } ?>
                            <div class="table-responsive">
                                <table id="example" class="cell-border display compact responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>NOMBRE</th>
                                            <th>SUELDO</th>
                                            <th>DIAS</th>
                                            <th>BONO</th>
                                            <th>PERCERPCIONES</th>
                                            <th>BOTAS</th>
                                            <th>OTROS</th>
                                            <th>INFONAVIT</th>
                                            <th>FONACOT</th>
                                            <th>TOTAL</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $sql = "SELECT * from  tblemployees where company='ASLO SEGURIDAD PRIVADA S.A. DE C.V.' and status=1 order by Firstname";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $a=json_encode($results, JSON_FORCE_OBJECT);
                                

                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {   
                                            
                                               //var_dump($a);
                                       //var_dump($result->name);
	
                                                ?>
                                                <tr>
                                                    <td> <?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->FirstName); ?>&nbsp;<?php echo htmlentities($result->LastName); ?>&nbsp;<?php echo htmlentities($result->name); ?></td>
                                                    <td><?php echo htmlentities($result->sueldodiario); ?></td>
                                                    <td><?php echo htmlentities($result->dias); ?> <a name="dias" href="#" onClick="mensaje2(<?php echo htmlentities($result->id); ?>)" title="Cambio de dias" class="tooltipped" data-position="bottom" data-tooltip="Cambio de dias"><i class="material-icons">update</i></a>
                                                    </td>
                                                    <td><?php 
                                                    if($result->dias !=15){
                                                        $bono1=0;
                                                         echo"$bono1";
                                                    }
                                                    else{
                                                    $bono2=$result->bono;
                                                    echo htmlentities($bono2); 
                                                    }
                                                    ?> 
                                                    
                                                </td>
                                                    <td>
                                                        <?php 
                                                    if($result->dias !=15){
                                                        $sueldo=$result->sueldodiario*$result->dias;
                                                    echo htmlentities($sueldo);
                                                    } else{
                                                    $sueldo=$result->sueldodiario*$result->dias;
                                                    $resultado=$sueldo+$result->bono;
                                                    echo htmlentities($resultado);

                                                    }
                                                    
                                                    ?></td>
                                                    <td >              </td>
                                                    <td>               </td>
                                                    <td><?php echo htmlentities($result->infonavitmon); ?><a name="infonavit" href="#" onClick="mensaje3(<?php echo htmlentities($result->id); ?>)" title="Cambio de monto infonavit" class="tooltipped" data-position="bottom" data-tooltip="Cambio de monto infonavit"><i class="material-icons">update</i></a>              </td>
                                                    <td><?php echo htmlentities($result->fonacotmon); ?> <a name="fonacot" href="#" onClick="mensaje4(<?php echo htmlentities($result->id); ?>)" title="Cambio de monto fonacot" class="tooltipped" data-position="bottom" data-tooltip="Cambio de monto fonacot"><i class="material-icons">update</i></a></td>
                                                    <td><?php echo htmlentities($resultado);?></td>


                                                </tr>
                                                
                                        <?php $cnt++;
                                       
                                            } ?>
                                            <a href="#" onClick="arr(<?php echo htmlentities($a); ?>)" title="Cambio de servicio" class="tooltipped" data-position="bottom" data-tooltip="Cambio de servicio"><i class="material-icons">edit</i>GENERAR NOMINA</a>
                                            
                                            <?php
                                            
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
function arr(results) {
    var datoss = results;
   console.log(datoss);
   // alert(datoss);
   //                        return false;
                           $.ajax({
   type: "POST",
   dataType: "json",
   url: "consultas/generate_nomina.php",
   data:datoss,

   success: function(data){
     console.log(data);
   },
   error: function(e){
     console.log(e.message);
   }

});
        }
        </script>
        <script>
            function mensaje(result) {
               
Swal
    .fire({
        title: "Cantidad:",
        input: "text",
        showCancelButton: true,
        confirmButtonText: "Guardar",
        cancelButtonText: "Cancelar",
        inputValidator: nombre => {
            // Si el valor es válido, debes regresar undefined. Si no, una cadena
            if (!nombre) {
                return "Por favor escribe una cantidad";
            } else {
                return undefined;
            }
        }
    })
    .then(resultado => {
        if (resultado.value) {
            var datos = result;
            let cantidad = resultado.value;
           // window.open('consultas/nom_bono_update.php?empid='+result+'&cantidad=' + cantidad, '_blank');
           var url = "consultas/nom_bono_update.php?empid="+result+"&cantidad=" + cantidad;
			
			//console.log(datos);
			//console.log(cantidad);
			//alert(datos);
			//alert(cantidad);
			//return false;

			$.ajax({
				type: "POST",
				url: url,
				data: {
					datos: datos,
					cantidad: cantidad
				},
				dataType: "json",
				success: function(data) {
					if (data.status == 'success') {
						Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'REGISTRO MODIFICADO',
							showConfirmButton: false,
						timer: 2500
						})
						location.reload(true);
					} else if (data.status == 'error') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'OCURRIO UN ERROR! 2',
						})
						//location.reload(true);

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
    });
            }

            function mensaje2(result) {
               
               Swal
                   .fire({
                       title: "Cantidad dias laborados:",
                       input: "text",
                       showCancelButton: true,
                       confirmButtonText: "Guardar",
                       cancelButtonText: "Cancelar",
                       inputValidator: nombre => {
                           // Si el valor es válido, debes regresar undefined. Si no, una cadena
                           if (!nombre) {
                               return "Por favor escribe una cantidad";
                           } else {
                               return undefined;
                           }
                       }
                   })
                   .then(resultado => {
                       if (resultado.value) {
                           var datos = result;
                           let cantidad = resultado.value;
                          // window.open('consultas/nom_bono_update.php?empid='+result+'&cantidad=' + cantidad, '_blank');
                          var url = "consultas/nom_dias_update.php?empid="+result+"&cantidad=" + cantidad;
                           
                           //console.log(datos);
                           //console.log(cantidad);
                           //alert(datos);
                           //alert(cantidad);
                           //return false;
               
                           $.ajax({
                               type: "POST",
                               url: url,
                               data: {
                                   datos: datos,
                                   cantidad: cantidad
                               },
                               dataType: "json",
                               success: function(data) {
                                   if (data.status == 'success') {
                                       Swal.fire({
                                           position: 'top-end',
                                           icon: 'success',
                                           title: 'REGISTRO MODIFICADO',
                                           showConfirmButton: false,
                                       timer: 2500
                                       })
                                       location.reload(true);
                                   } else if (data.status == 'error') {
                                       Swal.fire({
                                           icon: 'error',
                                           title: 'Oops...',
                                           text: 'OCURRIO UN ERROR! 2',
                                       })
                                       //location.reload(true);
               
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
                   });
                           }

          
        </script>

        <script>
function mensaje3(result) {
               
               Swal
                   .fire({
                       title: "Monto Infonavit:",
                       input: "text",
                       showCancelButton: true,
                       confirmButtonText: "Guardar",
                       cancelButtonText: "Cancelar",
                       inputValidator: nombre => {
                           // Si el valor es válido, debes regresar undefined. Si no, una cadena
                           if (!nombre) {
                               return "Por favor escribe una cantidad";
                           } else {
                               return undefined;
                           }
                       }
                   })
                   .then(resultado => {
                       if (resultado.value) {
                           var datos = result;
                           let cantidad = resultado.value;
                          // window.open('consultas/nom_bono_update.php?empid='+result+'&cantidad=' + cantidad, '_blank');
                          var url = "consultas/nom_montinfonavit_update.php?empid="+result+"&cantidad=" + cantidad;
                           
                           //console.log(datos);
                           //console.log(cantidad);
                           //alert(datos);
                           //alert(cantidad);
                           //return false;
               
                           $.ajax({
                               type: "POST",
                               url: url,
                               data: {
                                   datos: datos,
                                   cantidad: cantidad
                               },
                               dataType: "json",
                               success: function(data) {
                                   if (data.status == 'success') {
                                       Swal.fire({
                                           position: 'top-end',
                                           icon: 'success',
                                           title: 'REGISTRO MODIFICADO',
                                           showConfirmButton: false,
                                       timer: 2500
                                       })
                                       location.reload(true);
                                   } else if (data.status == 'error') {
                                       Swal.fire({
                                           icon: 'error',
                                           title: 'Oops...',
                                           text: 'OCURRIO UN ERROR! 2',
                                       })
                                       //location.reload(true);
               
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
                   });
                           }

          
        </script>
<script>
function mensaje4(result) {
               
               Swal
                   .fire({
                       title: "Monto Fonacot:",
                       input: "text",
                       showCancelButton: true,
                       confirmButtonText: "Guardar",
                       cancelButtonText: "Cancelar",
                       inputValidator: nombre => {
                           // Si el valor es válido, debes regresar undefined. Si no, una cadena
                           if (!nombre) {
                               return "Por favor escribe una cantidad";
                           } else {
                               return undefined;
                           }
                       }
                   })
                   .then(resultado => {
                       if (resultado.value) {
                           var datos = result;
                           let cantidad = resultado.value;
                          // window.open('consultas/nom_bono_update.php?empid='+result+'&cantidad=' + cantidad, '_blank');
                          var url = "consultas/nom_montinfonacot_update.php?empid="+result+"&cantidad=" + cantidad;
                           
                           //console.log(datos);
                           //console.log(cantidad);
                           //alert(datos);
                           //alert(cantidad);
                           //return false;
               
                           $.ajax({
                               type: "POST",
                               url: url,
                               data: {
                                   datos: datos,
                                   cantidad: cantidad
                               },
                               dataType: "json",
                               success: function(data) {
                                   if (data.status == 'success') {
                                       Swal.fire({
                                           position: 'top-end',
                                           icon: 'success',
                                           title: 'REGISTRO MODIFICADO',
                                           showConfirmButton: false,
                                       timer: 2500
                                       })
                                       location.reload(true);
                                   } else if (data.status == 'error') {
                                       Swal.fire({
                                           icon: 'error',
                                           title: 'Oops...',
                                           text: 'OCURRIO UN ERROR! 2',
                                       })
                                       //location.reload(true);
               
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
                   });
                           }

          
        </script>

    </body>

    </html>
<?php } ?>