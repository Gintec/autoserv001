// if($staffid!="adminkojo1" || $staffid!="KS27042431"){ 
<?php if($_SESSION['department']!="Admin"){ ?>
 <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="images/<?php echo $staffid; ?>/<?php echo $picture; ?>" alt="">
                            </div>
                            <div class="user-info">
                                <div>Hi <strong><?php echo $_SESSION['name']; ?></strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
						<?php if($_SESSION['department']=="Front Desk" || $_SESSION['designation']=="Administrator"){ ?>
						<form action="contacts.php" method="get" name="search" target="_blank">
                            <input type="text" name="searchkey" class="form-control input-group" style="border:0.5px #FFFFFF solid;" placeholder="Search Customers...">
                            <span class="input-group-btn input-group" style="position:absolute; right:0px; top:0px;">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
							</form>
							<?php } ?>
                        </div>
                        <!--end search section-->
                    </li>
                    <li class="selected">
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
					 <?php if($_SESSION['department']=="Front Desk"){ ?>
					<li>
                                <a href="ordersp.php">Pending Job Orders</a>
                            </li>
					<li>
					
                        <a href="#"><i class="fa fa-users  fa-fw"></i> Contacts/Customers<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="newcontact.php">New Customer</a>
                            </li>
                            <li>
                                <a href="contacts.php">All Customers</a>
                            </li>
							<li>
                                <a href="messaging.php">Send SMS</a>
                            </li>
						</ul>
                        <!-- second-level-items -->
                    </li>
					
					<li>
                        <a href="#"><i class="fa fa-users  fa-fw"></i>Jobs<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="pendingestimates.php">Pending Estimates</a>
                            </li>
							<li>
                                <a href="ordersp.php">Pending Job Orders</a>
                            </li>
							<li>
                                <a href="orders.php">Job Histories</a>
                            </li>
							<li>
                                <a href="psfulist.php">Post Service Follow-up</a>
                            </li>

                        </ul>
                        <!-- second-level-items -->
                    </li>
					<?php } ?>
					<?php if($_SESSION['department']=="Spare Parts / Store" || $_SESSION['department']=="Finance"){ ?>
					<li>
                                <a href="ordersp.php">Pending Job Orders</a>
                            </li>
                    <li>
                        <a href="#"><i class="fa fa-dollar fa-fw"></i> Sales/Supply<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
						<?php if($_SESSION['department']=="Spare Parts / Store"){ ?>
                            <li>
                                <a href="confirm.php">Confirm Parts Issued</a>
                            </li>
							 <li>
                                <a href="sparepartsr.php">Spare Parts Report</a>
                            </li>
							
							<li>
                                <a href="newsales.php">New Sales</a>
                            </li>
							<li>
                                <a href="pendingestimates.php">Pending Estimates</a>
                            </li>
							<li>
                                <a href="contacts.php">New Proforma Invoice</a>
                            </li>
							<li>
                                <a href="ordersproforma.php">Proforma Invoice List</a>
                            </li>
							<?php } ?>
							
							
							 <?php if($_SESSION['department']=="Finance"){ ?>
                           
							<li>
                                <a href="newexp.php">New Expenditure</a>
                            </li>
							<li>
                                <a href="newpayreports.php">Sales Report</a>
                            </li>
                            <?php } ?>
                        </ul>
                        <!-- second-level-items -->
                    </li>
					<?php } ?>
					<?php if($_SESSION['department']=="Body Work" || $_SESSION['department']=="Tire Service" || $_SESSION['department']=="Electrical" || $_SESSION['department']=="Mechanical" || $_SESSION['department']=="Front Desk"){ ?>
					
					<li>
                                <a href="vehicles.php">All Vehicles</a>
                     </li>
					
                     <?php } ?>
					 
					 <li>
                       <!-- <a href="#"><i class="fa fa-briefcase  fa-fw"></i> Parts/Service Orders<span class="fa arrow"></span></a>-->
                        <ul class="nav nav-second-level">
                           <?php if($_SESSION['department']=="Spare Parts / Store"){ ?>
						    <li>
                                <a href="partsorders.php">Parts Order</a>
                            </li>
							<?php } ?>
							<?php if($_SESSION['department']=="Body Work" || $_SESSION['department']=="Tire Service" || $_SESSION['department']=="Electrical" || $_SESSION['department']=="Mechanical"){ ?>
                            <li>
                                <a href="serviceorders.php">Service Order</a>
                            </li>
							<?php } ?>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                      <?php if($_SESSION['department']=="Spare Parts / Store"){ ?>
					 <li>
                        <a href="#"><i class="fa fa-list fa-fw"></i> Inventory<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="newinventory.php">New Item</a>
                            </li>
							<li>
                                <a href="inventory.php">All Inventory/Items</a>
                            </li>
						</ul>
                        <!-- second-level-items -->
                    </li>
                     <?php } ?>					
					 
					 <?php if($_SESSION['department']=="Front Desk"){ ?>
					<li>
                        <a href="#"><i class="fa fa-clock-o fa-fw"></i> Schedules<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="newschedule.php">New Schedule</a>
                            </li>
                            <li>
                                <a href="schedules.php">View All Schedules</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
					<?php } ?>	
					<?php if($_SESSION['designation']=="Cashier"){ ?>
					<li>
                                <a href="newexp.php">New Expenditure</a>
                            </li>
							<li>
                                <a href="newpayreports.php">Payment Reports</a>
                            </li>
					<li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Reports<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="debtors.php" target="_blank">Debtors</a>
                            </li>
							<li>
                                <a href="ordersp.php">Pending Orders</a>
                            </li>
							<li>
                                <a href="orders.php">All Jobs</a>
                            </li>
							<li>
                                <a href="newexpreports.php">Expenditure Reports</a>
                            </li>
							<li>
                                <a href="payroll.php">Pay Roll</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
					<?php } ?>			
                     <li>
                                <a href="newmemo.php"><i class="fa fa-book fa-fw"></i> New Memo</a>
                            </li>
					 <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Settings<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li>
                                <a href="logout2.php">Logout</a>
                            </li>
							<li>
                                <a href="backups/backupcode.php" target="_blank">Backup Database</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     
					 
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>


<?php }else{?>
 <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="images/<?php echo $staffid; ?>/<?php echo $picture; ?>" alt="">
                            </div>
                            <div class="user-info">
                                <div>Hi <strong><?php echo $_SESSION['name']; ?></strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
						<form action="contacts.php" method="get" name="search" target="_blank">
                            <input type="text" name="searchkey" class="form-control input-group" style="border:0.5px #FFFFFF solid;" placeholder="Search Customers...">
                            <span class="input-group-btn input-group" style="position:absolute; right:0px; top:0px;">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
							</form>
                        </div>
                        <!--end search section-->
                    </li>
                    <li class="selected">
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-users  fa-fw"></i> Contacts/Customers<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="newcontact.php">New Customer</a>
                            </li>
                            <li>
                                <a href="contacts.php">All Customers</a>
                            </li>
							<li>
                                <a href="messaging.php">Send SMS</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dollar fa-fw"></i> Sales/Expenditure<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="newsales.php">New Sales</a>
                            </li>
                            <li>
                                <a href="sales.php">All Sales</a>
                            </li>
							<li>
                                <a href="newexp.php">New Expenditure</a>
                            </li>
                            
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     
					 <li>
                        <a href="#"><i class="fa fa-bars fa-fw"></i> Customer Vehicles<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                             <li>
                                <a href="vehicles.php">All Vehicles</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     
					 <li>
                        <a href="#"><i class="fa fa-briefcase  fa-fw"></i>Orders<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
						<li>
                                <a href="ordersp.php">Pending Orders</a>
                            </li>
							<li>
                                <a href="orders.php">All Jobs</a>
                            </li>
                            <li>
                                <a href="partsorders.php">Parts Order</a>
                            </li>
                            <li>
                                <a href="serviceorders.php">Service Order</a>
                            </li>
							<li>
                                <a href="contacts.php">New Proforma Invoice</a>
                            </li>
							<li>
                                <a href="ordersproforma.php">Proforma Invoice List</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     
					 <li>
                        <a href="#"><i class="fa fa-list fa-fw"></i> Inventory<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="newinventory.php">New Item</a>
                            </li>
                            <li>
                                <a href="inventory.php">All Inventory/Items</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     
					 <li>
                        <a href="#"><i class="fa fa-adn fa-fw"></i> Services<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="newservice.php">Add a New Service</a>
                            </li>
                            <li>
                                <a href="services.php">All Services</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     <?php if($staffid!="KS27042431"){ ?>
					 <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Personnel<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="newpersonnel.php">New Staff</a>
                            </li>
                            <li>
                                <a href="personnel.php">Staff List</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
					 <?php } ?>
					
					<li>
                        <a href="#"><i class="fa fa-clock-o fa-fw"></i> Schedules<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="newschedule.php">New Schedule</a>
                            </li>
                            <li>
                                <a href="schedules.php">View All Schedules</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
					
					<li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Reports<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
						<li>
                                <a href="debtors.php">Debtors</a>
                            </li>
                            <li>
                                <a href="newmemo.php">New Memo</a>
                            </li>
							<li>
                                <a href="ordersp.php">Pending Orders</a>
                            </li>
							<li>
                                <a href="orders.php">All Jobs</a>
                            </li>
							<li>
                                <a href="newreports.php">Sales/Services Reports</a>
                            </li>
							<li>
                                <a href="newpayreports.php">Payment Reports</a>
                            </li>
							<li>
                                <a href="newexpreports.php">Expenditure Reports</a>
                            </li>
							<li>
                                <a href="contacts.php">New Proforma Invoice</a>
                            </li>
							<li>
                                <a href="ordersproforma.php">Proforma Invoice List</a>
                            </li>
							<li>
                                <a href="payroll.php">Pay Roll</a>
                            </li>
							<li>
                                <a href="confirm.php">Confirm Parts Issued</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     
					 <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Settings<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="personnel.php">Manage Accounts</a>
                            </li>
                            <li>
                                <a href="logout.php">Logout</a>
                            </li>
							<li>
                                <a href="backups/backupcode.php" target="_blank">Backup Database</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     
					 
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
<?php } ?>