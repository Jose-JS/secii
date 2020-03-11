        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <!--<div class="spinner-layer spinner-spinner-teal lighten-1">-->
                   <div class="spinner-layer spinner-spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="blue-grey darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s1">    
                        <!--<span class="header-title col s1">SistemaSIM </span>  -->
                      
   

                        </div>
                        
                      
                        <ul class="right col s9 m3 nav-right-menu">
                        
                            <li class="hide-on-small-and-down"><a href="javascript:void(0)" data-activates="dropdown1" class="dropdown-button dropdown-right show-on-large"><i class="material-icons">notifications_none</i>
<?php 
$isread=0;
$sql = "SELECT id from tbldoublets where isread=0
UNION ALL
SELECT id from tblincidents where isread=0";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$unreadcount=$query->rowCount();?>


                                <span class="badge"><?php echo htmlentities($unreadcount);?></span>

                            </a></li>
                        </ul>
                        
                        <ul id="dropdown1" class="dropdown-content notifications-dropdown">
                            <li class="notificatoins-dropdown-container">
                                <ul>
                                    <li class="notification-drop-title">Notificaciones</li>
<?php 
$isread=0;
$sql = "SELECT tblincidents.id as Aid,tblemployees.FirstName,tblemployees.LastName,tblemployees.name,tblemployees.EmpId,tblincidents.datetime from tblincidents join tblemployees on tblincidents.empid=tblemployees.EmpId where tblincidents.isread=:isread";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{            ?>  


                                    <li>
                                       
                                        <a href="manageincidents.php?incidentid=<?php echo htmlentities($result->Aid);?>" onclick="return valid();">
<script>
function valid() {  
<?php 
 $id=$_GET['incidentid'];
 $isread=1;
$sql = "update tblincidents set isread=:isread  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':isread',$isread, PDO::PARAM_STR);
$query -> execute();
                                                                 
  ?>                                                             
    
}
</script>                                          
                                        <div class="notification">
                                            <div class="notification-icon circle cyan"><i class="material-icons">done</i></div>
                    <div class="notification-text"><p><b><?php echo htmlentities($result->EmpId." ".$result->name." ".$result->FirstName);?>
                                       <br/></b> creación de incidencia </p><span>a <?php echo htmlentities($result->datetime);?></b</span></div>
                                        </div>
                                        </a>
                                    </li>
                                   <?php }}?>
                                              
                                              
                                              
<?php 
$isread=0;
$sql = "SELECT tbldoublets.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.name,tblemployees.EmpId,tbldoublets.datetime from tbldoublets join tblemployees on tbldoublets.empid=tblemployees.EmpId where tbldoublets.isread=:isread";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  


                                    <li>
                                        <a href="managedoublets.php?doubletsid=<?php echo htmlentities($result->lid);$id=$_GET['doubletsid'];
$isread=1;
$sql = "update tbldoublets set isread=:isread  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':isread',$isread, PDO::PARAM_STR);
$query -> execute();?>">
                                        <div class="notification">
                                            <div class="notification-icon circle red"><i class="material-icons">done</i></div>
                    <div class="notification-text"><p><b><?php echo htmlentities($result->EmpId." ".$result->name." ".$result->FirstName);?><br/></b> creación de doblete </p><span>a <?php echo htmlentities($result->datetime);?></b</span></div>
                                        </div>
                                        </a>
                                    </li>
                                   <?php }}?>                                              
                                               
                                   
                                  
                        </ul>
                    </div>
                </nav>
            </header>