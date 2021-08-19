<aside id="slide-out" class="side-nav white fixed">
    <div class="side-nav-wrapper">
        <div class="sidebar-profile ">
            <div class="sidebar-profile-image ">
                <!--<img src="../assets/images/profile-image.png" class="circle" alt="">-->

            </div>
            <div class="sidebar-profile-info" align="center">
                <?php
                $eid = $_SESSION['eid'];
                //$eid=$_GET['i'];                         
                $sql = "SELECT * from  tblclients where id=:eid";
                $query = $dbh->prepare($sql);
                $query->bindParam(':eid', $eid, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) {
                        $resultado = substr($result->image, 0);
                ?>
                        <img id="foto" name="foto" class="circle" autocomplete="off" src="<?php echo htmlentities($resultado); ?>" width="100" height="100" required>
                        <p><?php echo htmlentities($result->name . " " . $result->firstname . " " . $result->lastname); ?></p>
                <?php }
                } ?>
            </div>

        </div>
        <?php
        $eid = $_SESSION['eid'];
        $sql = "SELECT * from  tblclients where id=:eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':eid', $eid, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query->rowCount() > 0) {
            foreach ($results as $result) {    ?>
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                    <li class="no-padding"><a class="waves-effect waves-grey" href="dashboard.php"><i class="material-icons">house</i>Escritorio</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="services.php?i=<?php echo htmlentities($result->id); ?>"><i class="material-icons">folder_shared</i>Servicios</a></li>

                    <!--<li class="no-padding"><a class="waves-effect waves-grey" href="adduser.php"><i class="material-
                    icons">user</i>Usuarios</a></li>-->

                    <!-- <li class="no-padding"><a class="waves-effect waves-grey" href="addincidents.php"><i class="material-
                    icons"></i>Incidencias</a></li>-->



                    <!--<li class="no-padding"><a class="waves-effect waves-grey" href="manageemployee2.php?service=<?php echo htmlentities($result->service); ?>"><i class="material-icons">event</i>Tecnicos</a></li>
                          
                    <li class="no-padding"><a class="waves-effect waves-grey" href="https://accounts.google.com/signin/v2/identifier?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" about="_blank"><i class="material-icons">event</i>Tecnicos</a></li> -->


            <?php  }
        } ?>


            <!-- <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">assignment</i>Dobletes<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="adddoublets.php">Agregar doblete </a></li>
                                <li><a href="managedoublets.php">Administrar doblete</a></li>
                            </ul>
                        </div>
                    </li> -->




            <li class="no-padding">

            </li>
                </ul>
                <div class="footer">
                    <a class="waves-effect waves-grey" href="logout.php"><i class="material-icons">exit_to_app</i>Desconectar</a>
                    <!--<p class="copyright">.: Sistema SIM :.<a href=""></a>©</p>-->

                </div>
    </div>
</aside>