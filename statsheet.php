            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!--End Page Header -->
            </div>

<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h3 class="center">
Expenditures Waiting Approval: <a href="aexpstatement.php" class="btn btn-default btn-sm" target="_blank"><?php echo mysql_num_rows(mysql_query("SELECT * FROM expenditure WHERE spentby='Not Approved' ORDER BY category DESC")); ?>
 View All</h3> </a>
                </div>
                <!--End Page Header -->
            </div>
            <div class="row">
                <!--quick info section -->
				
								<div class="col-lg-3">
                  <div class="alert alert-success text-center">
                        <i class="fa fa-dollar fa-3x"></i>&nbsp;<b> </b>New Sales.<hr />
                    <a href="newsales.php" class="btn btn-primary btn-sm">New Sales</a>
				  </div>
                </div>
				
				
                <div class="col-lg-3">
                  <div class="alert alert-success text-center">
                        <i class="fa fa-users fa-3x"></i>&nbsp;<?php $customers = mysql_query("SELECT * FROM contacts") or die(mysql_error()); echo mysql_num_rows($customers); ?><b> </b>Customers.<hr />
					<div class="btn-group">
					<a href="contacts.php" class="btn btn-warning btn-sm btn-group">View All</a>
                    <a href="newcontact.php" class="btn btn-success btn-sm">Add New</a>
					</div>
				  </div>
                </div>
				
				<div class="col-lg-3">
                  <div class="alert alert-danger text-center">
                        <i class="fa fa-wrench fa-3x"></i>&nbsp;<?php $joborders = mysql_query("SELECT DISTINCT * FROM jobs WHERE status='Pending'") or die(mysql_error()); echo mysql_num_rows($joborders); ?><b> </b>Pending Orders.<hr />
						<div class="btn-group">
                    <a href="ordersp.php" class="btn btn-danger btn-sm btn-group">View All</a>
					<a href="pendingestimates.php" class="btn btn-default btn-sm btn-group">Pending Estimates</a>
					</div>
				  </div>
                </div>
				
				<div class="col-lg-3">
                  <div class="alert alert-warning text-center">
                        <i class="fa fa-briefcase fa-3x"></i>&nbsp;<?php $joborders = mysql_query("SELECT DISTINCT * FROM jobs WHERE status='Done'") or die(mysql_error()); echo mysql_num_rows($joborders); ?><b> </b>Jobs Done.<hr />
                    <a href="orders.php" class="btn btn-warning btn-sm">View All</a>
				  </div>
                </div>
				

				<!--end quick info section -->
            </div>

            <div class="row">
                <div class="col-lg-8">



                    <!--Area chart example -->
                    
                    <!--End area chart example -->
                    <!--Simple table example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i>Vehicle Schedule/Maintenance
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
									
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Client</th>
                                                    <th>Services</th>
                                                    <th>Appointment Date</th>
                                                    <th>Location</th>
													<th>View</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php
											$getsch = mysql_query("SELECT * FROM schedule ORDER BY nextappointment LIMIT 1,10") or die(mysql_error());
while($sch = mysql_fetch_array($getsch)){?>										
                                                <tr>
                                                    <td><?php $customerid = $sch['customerid']; echo $customername = mysql_result(mysql_query("SELECT name FROM contacts WHERE customerid='$customerid' LIMIT 1"),0); ?></td>
                                                    <td><?php echo $sch['services']; ?></td>
                                                    <td><?php echo $sch['nextappointment']; ?></td>
                                                    <td><?php echo $sch['location']; ?></td>
													<td><a href="schedulesheet.php?shid=<?php echo $sch['shid']; ?>&customerid=<?php echo $sch['customerid']; ?>" target="_blank" class="btn btn-sm btn-warning">View</a></td>
                                                </tr>
												<?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!--End simple table example -->

                </div>

                <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body yellow">
                            <i class="fa fa-clock-o fa-3x"></i>
                            <h3><?php echo $schedules = mysql_num_rows(mysql_query("SELECT * FROM schedule WHERE nextappointment>NOW()")) or die(mysql_error()); ?></h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Appointment/Schedules
                            </span>
							<hr />
                    <a href="schedules.php" class="btn btn-warning btn-sm">View All</a>
                        </div>
                    </div>
					
                </div>

            </div>

            