<div id="wrapper">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <a class="navbar-brand" href="index.php">
    <p><img src = "../images/logo.png"  height = "30px" ><img> Food Storks</p>
    </a> </div>
  <!-- /.navbar-header -->
  
  <ul class="nav navbar-top-links navbar-right">
    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-user fa-fw"></i> MY ACCOUNT <i class="fa fa-caret-down"></i> </a>
      <ul class="dropdown-menu dropdown-user">
        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a> </li>
        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a> </li>
        <li class="divider"></li>
        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
      </ul>
      <!-- /.dropdown-user --> 
    </li>
    <!-- /.dropdown -->
  </ul>
  <!-- /.navbar-top-links -->
  
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">
        <li class="sidebar-search">
          <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
          <!-- /input-group --> 
        </li>
        <li><center><a href="#"><font size="4" color="black">Restaurant Manager Page</font></a></center></li>
        <li> <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a> </li>
        <li> <a href="#"><i class="fa fa-group fa-fw"></i> My Staff<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li> <a href="add_staff.php"><i class="fa fa-plus fa-fw"></i> Add Staff</a> </li>
            <li> <a href="view_staff.php"><i class="fa fa-user fa-fw"></i> View My Staff</a> </li>
          </ul>
          <!-- /.nav-second-level --> 
        </li>
        <li> <a href="add_rest.php"><i class="fa fa-plus fa-fw"></i> Add Restaurant</a> </li>
        <li> <a href="#"><i class="fa fa-group fa-fw"></i> Restaurant's Info<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <?php 
				include('connect.php');
				$query=mysqli_query($conn,"select rest_id,rest_name from restaurant where rest_owner = '$session_id' ") or die(mysql_error());
				while($row=mysqli_fetch_assoc($query)){?>
              		<li> 
                    	 <a href="rest_info.php<?php echo '?rest_id='.$row['rest_id']; ?>">
                         	<i class="fa fa-arrow-circle-o-right fa-fw"></i><?php echo $row['rest_name']; ?>
                         </a> 
                	</li>
              	<?php } ?>
          </ul>
          <!-- /.nav-second-level --> 
        </li>
        <li> <a href="#"><i class="fa fa-group fa-fw"></i> Restaurant's Menu<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <?php 
				$query=mysqli_query($conn,"select rest_id,rest_name from restaurant where rest_owner = '$session_id' ") or die(mysql_error());
				while($row=mysqli_fetch_assoc($query)){?>
              		<li> 
                    	 <a href="rest_menu.php<?php echo '?rest_id='.$row['rest_id']; ?>">
                         	<i class="fa fa-arrow-circle-o-right fa-fw"></i><?php echo $row['rest_name']; ?>
                         </a> 
                	</li>
              	<?php } ?>
          </ul>
          <!-- /.nav-second-level --> 
        </li>
        <li> <a href="#"><i class="fa fa-group fa-fw"></i> Restaurant Report<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <?php 
				$query=mysqli_query($conn,"select rest_id,rest_name from restaurant where rest_owner = '$session_id' ") or die(mysql_error());
				while($row=mysqli_fetch_assoc($query)){?>
              		<li> 
                    	 <a href="rest_report.php<?php echo '?rest_id='.$row['rest_id']; ?>">
                         	<i class="fa fa-arrow-circle-o-right fa-fw"></i><?php echo $row['rest_name']; ?>
                         </a> 
                	</li>
              	<?php } ?>
          </ul>
          <!-- /.nav-second-level --> 
        </li>
        <li><center><a href="#"><font size="4" color="black">Staff Menu</font></a></center></li>
        <li> <a href="#"><i class="fa fa-group fa-fw"></i> Order (Cook Menu)<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <?php 
				$query=mysqli_query($conn,"select rest_id,rest_name from restaurant where rest_owner = '$session_id' ") or die(mysql_error());
				while($row=mysqli_fetch_assoc($query)){?>
              		<li> 
                    	 <a href="order.php<?php echo '?rest_id='.$row['rest_id']; ?>">
                         	<i class="fa fa-arrow-circle-o-right fa-fw"></i><?php echo $row['rest_name']; ?>
                         </a> 
                	</li>
              	<?php } ?>
          </ul>
          <!-- /.nav-second-level --> 
        </li>
         <li> <a href="#"><i class="fa fa-group fa-fw"></i> Payment (Waiter Menu)<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <?php 
				$query=mysqli_query($conn,"select rest_id,rest_name from restaurant where rest_owner = '$session_id' ") or die(mysql_error());
				while($row=mysqli_fetch_assoc($query)){?>
              		<li> 
                    	 <a href="payment.php<?php echo '?rest_id='.$row['rest_id']; ?>">
                         	<i class="fa fa-arrow-circle-o-right fa-fw"></i><?php echo $row['rest_name']; ?>
                         </a> 
                	</li>
              	<?php } ?>
          </ul>
          <!-- /.nav-second-level --> 
        </li> 
        <li> <a href="#"><i class="fa fa-group fa-fw"></i> Table Status (Waiter & Busboy Menu)<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <?php 
				$query=mysqli_query($conn,"select rest_id,rest_name from restaurant where rest_owner = '$session_id' ") or die(mysql_error());
				while($row=mysqli_fetch_assoc($query)){?>
              		<li> 
                    	 <a href="table_status.php<?php echo '?rest_id='.$row['rest_id']; ?>">
                         	<i class="fa fa-arrow-circle-o-right fa-fw"></i><?php echo $row['rest_name']; ?>
                         </a> 
                	</li>
              	<?php } ?>
          </ul>
          <!-- /.nav-second-level --> 
        </li>
      </ul>
    </div>
    <!-- /.sidebar-collapse --> 
  </div>
  <!-- /.navbar-static-side --> 
</nav>
