<br>
<br>
<h3 align="center">ALL SCHEDULES</h3>
<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
  <thead>
                                                <tr>
                                                    <th>Client</th>
                                                    <th>Services</th>
                                                    <th>Next Appointment Date</th>
                                                    <th>Location</th>
													<th>View</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php
											$getsch = mysql_query("SELECT * FROM schedule ORDER BY nextappointment LIMIT 0,10") or die(mysql_error());
while($sch = mysql_fetch_array($getsch)){?>										
                                                <tr>
                                                    <td><?php $customerid = $sch['customerid']; echo $customername = mysql_result(mysql_query("SELECT name FROM contacts WHERE customerid='$customerid' LIMIT 1"),0); ?></td>
                                                    <td><?php echo $sch['services']; ?></td>
                                                    <td><?php echo $sch['nextappointment']; ?></td>
                                                    <td><?php echo $sch['location']; ?></td>
													<td><a href="schedulesheet.php?shid=<?php echo $sch['shid']; ?>&customerid=<?php echo $sch['customerid']; ?>" class="btn btn-sm btn-warning" target="_blank">View</a></td>
                                                </tr>
												<?php } ?>
</tbody>
</table>
</div>