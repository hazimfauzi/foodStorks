<?php 
include('header.php');
include('session.php');
include('connect.php'); 
include('navbar.php'); 
?>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-group fa-fw"></i>View Manager</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                                <thead>
                                    <tr>
                       
                                        <center>
                                        	<th><center>No.</center></th>
											<th><center>First Name</center></th>                                 
											<th><center>Last Name</center></th>
                                            <th><center>Email</center></th>
											<th><center>Gender</center></th>
											<th><center>Address</center></th>
											<th><center>Phone No.</center></th>
										</center>
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php  $user_query=mysqli_query($conn,"select * from users where level='manager' and email !='$email'")or die(mysql_error());
								  $bil=0;
									while($row=mysqli_fetch_array($user_query)){
									$bil++;
									$id=$row['email'];  ?>
									<tr class="del<?php echo $id ?>">
                                    	<td><?php echo $bil; ?></td>
										<td><?php echo $row['first_name']; ?></td>
										<td><?php echo $row['last_name']; ?> </td> 
										<td><?php echo $row['email']; ?> </td>  
										<td><?php echo $row['gender']; ?> </td>
										<td><?php echo $row['address']; ?></td>
										<td><?php echo $row['contact']; ?></td> 
										
								    </tr>
									<?php  }  ?>
                           
                                </tbody>
                            </table>
                            
                            
						<!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables').DataTable({
            responsive: true
        });
    });
    </script>
</body>

</html>    