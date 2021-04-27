<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>Admin | Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <meta name="description" content="Responsive Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Steelcoders" />

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
    <link href="../assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


    <!-- Theme Styles -->
    <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.opacity{
	
  /* <--!opacity:0.6; /* Opacidad 60% */
}
	
        
        
    </style>
</head>

<body>
    <?php include('includes/header.php');?>

    <?php include('includes/sidebar.php');?>

    <main class="mn-inner">
        <div class="middle-content ">
            <div class="row no-m-t no-m-b ">
                <div class="col s12 m12 l3 ">
                    <div class="card stats-card opacity">
                        <div class="card-content ">

                            <span class="card-title">Técnicos</span>
                            <span class="stats-counter">
                                <?php
$sql = "SELECT id from tblemployees";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$empcount=$query->rowCount();
?>

                                <span class="counter"><?php echo htmlentities($empcount);?></span></span>
                        </div>



                        <div id="sparkline-bar"></div>
                    </div>
                </div>
                <div class="col s12 m12 l3">
                    <div class="card stats-card opacity">
                        <div class="card-content">

                            <span class="card-title">Puestos</span>
                            <?php
$sql = "SELECT id from tbldepartments";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$dptcount=$query->rowCount();
?>
                            <span class="stats-counter"><span class="counter"><?php echo htmlentities($dptcount);?></span></span>
                        </div>
                        <div id="sparkline-line"></div>
                    </div>
                </div>

                <div class="col s12 m12 l3">
                    <div class="card stats-card opacity">
                        <div class="card-content">
                            <span class="card-title">Servicios</span>
                            <?php
$sql = "SELECT id from  tblserviceassigned";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$leavtypcount=$query->rowCount();
?>
                            <span class="stats-counter"><span class="counter"><?php echo htmlentities($leavtypcount);?></span></span>

                        </div>
                        <div class="progress stats-card-progress">
                            <div class="determinate" style="width: 70%"></div>
                        </div>
                    </div>
                </div>


            </div>

            <!--<div class="row no-m-t no-m-b">
                        <div class="col s12 m12 l12">
                            <div class="card invoices-card">
                                <div class="card-content">
                                 
                                    <span class="card-title">Últimas aplicaciones de Permisos</span>
                             <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th width="200">Nombre</th>
                                            <th width="120">Permiso</th>

                                             <th width="180">Fecha de publicación</th>                 
                                            <th>Estado</th>
                                            <th align="center">Acción</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php $sql = "SELECT tblleaves.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.name,tblemployees.EmpId,tblemployees.id,tblleaves.LeaveType,tblleaves.PostingDate,tblleaves.Status from tblleaves join tblemployees on tblleaves.empid=tblemployees.id order by lid desc limit 100";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>  

                                        <tr>
                                            <td> <b><?php echo htmlentities($cnt);?></b></td>
                                              <td><a href="editemployee2.php?empid=<?php echo htmlentities($result->id);?>" target="_blank"><?php echo htmlentities($result->name." ".$result->FirstName." ".$result->LastName);?>(<?php echo htmlentities($result->EmpId);?>)</a></td>
                                            <td><?php echo htmlentities($result->LeaveType);?></td>
                                            <td><?php echo htmlentities($result->PostingDate);?></td>
                                                                       <td><?php $stats=$result->Status;
if($stats==1){
                                             ?>
                                                 <span style="color: green">Aprobado</span>
                                                 <?php } if($stats==2)  { ?>
                                                <span style="color: red">No aprovado</span>
                                                 <?php } if($stats==0)  { ?>
 <span style="color: blue">A la espera de la aprobación</span>
 <?php } ?>


                                             </td>

          <td>
           <td><a href="leave-details.php?leaveid=<?php echo htmlentities($result->lid);?>" class="waves-effect waves-light btn blue m-b-xs"  > Ver detalles</a></td>
                                    </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>-->
            <div class="col s12 m12 l3">
                <div class="card stats-card opacity">
                    <div class="card-content">
                        <span class="card-title">Activos e Inactivos</span>

                        <canvas id="myChart" ></canvas>
                    </div>
                </div>
            </div>


            <script>
                var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Técnicos'],
                        datasets: [{
                                label: 'Activo',
                                backgroundColor: ['rgba(75, 192, 192, 0.2)'],
                                borderColor: ['rgba(75, 192, 192, 1)'],
                                data:

                                    <?php            
$sql = "SELECT * from  tblemployees where Status=1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':eid',$eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$leavtypcount=$query->rowCount();
                    ?>[<?php echo htmlentities($leavtypcount);?>],
                                borderWidth: 1
                            },
                            {
                                label: 'Inactivo',
                                backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                                borderColor: ['rgba(255, 99, 132, 1)'],
                                data:

                                    <?php            
$sql = "SELECT * from  tblemployees where Status=0";
$query = $dbh -> prepare($sql);
$query -> bindParam(':eid',$eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$leavtypcount=$query->rowCount();
                    ?>[<?php echo htmlentities($leavtypcount);?>],
                                borderWidth: 1

                            }




                        ]
                    },
                    responsive: true,
                    options: {


                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }

                });
            </script>


        </div>

    </main>
    </div>



    <!-- Javascripts -->
    <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
    <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="../assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
    <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/plugins/chart.js/chart.min.js"></script>
    <script src="../assets/plugins/flot/jquery.flot.min.js"></script>
    <script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
    <script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
    <script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
    <script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../assets/plugins/curvedlines/curvedLines.js"></script>
    <script src="../assets/plugins/peity/jquery.peity.min.js"></script>
    <script src="../assets/js/alpha.min.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>


</body>

</html>
<?php } ?>