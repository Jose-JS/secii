<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['recursos'])==0)
    {   
header('location:index.php');
}
else{

    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>Recursos Materiales | Agregar articulo inventario</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <meta name="description" content="Responsive Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Steelcoders" />
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
    <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
    
</head>
<body>
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Agregar articulo a inventario</div>
            </div>
            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">

                        <div class="row">
                            <form class="col s12" id="formulario" name="formulario" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="descripcion" type="text" name="descripcion" class="validate" autocomplete="off" required />
                                        <label for="descripcion">Descripción</label>
                                    </div>

                                    <div class="input-field col s12">
																<select id="empresa" name="empresa" autocomplete="off">
																	<option value="">Empresa</option>
																	<option value="APROSEMEX S.A. DE C.V.">APROSEMEX S.A. DE C.V.</option>
																	<option value="ASLO SEGURIDAD PRIVADA S.A. DE C.V.">ASLO SEGURIDAD PRIVADA S.A. DE C.V.
																	</option>
																	<option value="OIFSI S.A. DE C.V.">OIFSI S.A. DE C.V.</option>
																	<option value="OISME S.A. DE C.V.">OISME S.A. DE C.V.</option>
																</select>
															</div>


                                    <div class="input-field col s12">
                                        <input id="talla" type="text" class="validate" autocomplete="off" name="talla" required />
                                        <label for="talla">talla</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <input id="estado" type="text" name="estado" class="validate" autocomplete="off" required />
                                        <label for="estado">Estado</label>
                                    </div>


                                    <div class="input-field col s12">
                                        <input type="text" id="cantidad" name="cantidad" class="validate" required />
                                        <label for="cantidad">Cantidad</label>
                                    </div>

									<div class="input-field col s12">
                                                            <label for="fecha">Fecha</label><br>

                                                            <input id="fecha" name="fecha" tabindex="25" type="date" autocomplete="off">
                                                        </div>

                                    <div class="input-field col s12">
                                        <input type="submit" class="waves-effect waves-light btn indigo m-b-xs" value="GUARDAR" />

                                    </div>

                                </div>

                            </form>
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
    <script src="../assets/js/alpha.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
    $(function() {
            $("#formulario").on("submit", function(e) {
                e.preventDefault();
                var url = "consultas/inserttblinventorynew.php";
                var datos = $("#formulario").serialize();
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
                                    html: 'Se estan guardando los datos !',
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
                                position: 'top-end',
                                icon: 'success',
                                title: 'DATOS GUARDADOS',
                                showConfirmButton: false,
                                timer: 2500
                            })
							document.getElementById("formulario").reset();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'OCURRIO UN ERROR! 2',
                            })
                        }
                    },
                    error: function(e) {
						if (e != 0) {
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'No se ha podido guardar la información',
							})
						}
					},
                });
                return false;
            });

        });

    </script>
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
