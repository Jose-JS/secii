     <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                        <!--    <img src="assets/images/profile-image.png" class="circle" alt="">-->
                        </div>
                        <div class="sidebar-profile-info">
                    <?php
$eid=$_SESSION['eid'];
                      
$sql = "SELECT * from  tblemployees where id=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{            $resultado = substr($result->imagehalfbody, 3);   
                            ?>
                            <img id="foto" name="foto" class="circle" autocomplete="off" src="<?php echo htmlentities($resultado);?>"width="100" height="100" required>
                            <p><?php echo htmlentities($result->name." ".$result->FirstName." ".$result->LastName);?></p>
                                <span><?php echo htmlentities($result->EmpId)?></span>
                         <?php }} ?>
                        </div>
                    </div>

                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">

  <li class="no-padding"><a class="waves-effect waves-grey" href="myprofile.php"><i class="material-icons">account_box</i>Mi perfil</a></li>
  <li class="no-padding"><a class="waves-effect waves-grey" href="emp-changepassword.php"><i class="material-icons">settings_input_svideo</i>Cambia la contraseña</a></li>
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">aplicaciones</i>Acciones<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="apply-leave.php">Permiso</a></li>
                                <li><a href="leavehistory.php">Historial de Permiso</a></li>
                            </ul>
                        </div>
                    </li>



                  <li class="no-padding">
                              
                            </li>


                </ul>
                <div class="footer">
                      <a class="waves-effect waves-grey" href="logout.php"><i class="material-icons">exit_to_app</i>Desconectar</a>
                </div>
                </div>
            </aside>
