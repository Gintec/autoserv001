<!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/logo.png" alt="KOJO MOTORS" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li class="dropdown">
				<?php
				if(isset($_SESSION['staffid'])){$staffid = $_SESSION['staffid'];}else{$staffid='adminkojo1'; }
					$getr = mysql_query("SELECT * FROM reports WHERE reciever='$staffid' AND status='Unread'") or die(mysql_error());
						$c = mysql_num_rows($getr);
						?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
					
                        <span class="top-label label label-danger"><?php echo $c; ?></span><i class="fa fa-envelope fa-3x"></i>
                    </a>
                    <!-- dropdown-messages -->
                    <ul class="dropdown-menu dropdown-messages">
                        <?php
						while($rs = mysql_fetch_array($getr)){
						
						?>
						<li>
                            <a href="memo.php?mid=<?php echo $rs['mid']; ?>">
                                <div>
                                    <strong><span class=" label label-danger"><?php $sender = $rs['sender']; echo mysql_result(mysql_query("SELECT surname FROM personnel WHERE staffid='$sender' LIMIT 1"),0); ?></span></strong>
                                    <span class="pull-right text-muted">
                                        <em><?php echo $rs['dated']; ?></em>
                                    </span>
                                </div>
                                <div><small><?php echo $rs['title']; ?></small></div>
                            </a>
                        </li>
                        <li class="divider"></li>
						<?php } ?>
                        <li>
                            <a class="text-center" href="memo.php">
                                <strong>Read All Memos</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- end dropdown-messages -->
                </li>

                <li class="dropdown">
				<?php
$query = "SELECT partdesc,quantity,qpurchased FROM inventory WHERE quantity<20";  
$result = mysql_query($query) or die(mysql_error());
// Print out result
?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                        <span class="top-label label label-success"><?php echo mysql_num_rows($result); ?></span>  <i class="fa fa-tasks fa-3x"></i>
                    </a>
                    <!-- dropdown tasks -->
                    <ul class="dropdown-menu dropdown-tasks">
<?php
while($row = mysql_fetch_array($result)){
$partdesc = $row['partdesc'];
$quantity = $row['quantity'];
$value = $row['qpurchased'];
$per = number_format(($quantity/$value)*100,0);
?>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong><?php echo $partdesc; ?></strong>
                                        <span class="pull-right text-muted"><?php echo $quantity; ?> Units <small>(<?php echo $per; ?>% Remaining)</small></span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $quantity; ?>" aria-valuemin="0" aria-valuemax="<?php echo $value; ?>" style="width: <?php echo $per; ?>%">
                                            <span class="sr-only"><?php echo (100-$per); ?>% Sold</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <?php } ?>
						<li>
						
                            <a class="text-center" href="inventory.php">
                                <strong>See All Inventory</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- end dropdown-tasks -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<?php
					$today = ("Y-m-d");
					$scd = mysql_query("SELECT * FROM schedule WHERE DATE(nextappointment)>=NOW() ORDER BY nextappointment LIMIT 1,10") or die(mysql_error());

					$count = mysql_num_rows($scd);
					?>
                        <span class="top-label label label-warning"><?php echo $count; ?></span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                    <!-- dropdown alerts-->
                    <ul class="dropdown-menu dropdown-alerts">
					<?php
						while($ps = mysql_fetch_array($scd)){
						?>
                        <li>
                            <a href="schedulesheet.php?customerid=<?php echo $ps['customerid']; ?>&shid=<?php echo $ps['shid']; ?>" target="_blank">
                                <div>
                                    <i class="fa fa-clock-o fa-fw"></i><?php $customerid = $ps['customerid']; echo $customername = mysql_result(mysql_query("SELECT name FROM contacts WHERE customerid='$customerid' LIMIT 1"),0); ?>
									
                                    <span class="pull-right text-muted small">Location: <?php echo $ps['location']; ?> (<?php echo $ps['nextappointment']; ?>)</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
						<?php } ?>
                           <li>
                            <a class="text-center" href="schedules.php">
                                <strong>All Schedules</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- end dropdown-alerts -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        
                        
                        
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->
