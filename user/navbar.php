<!-- navigation section -->
<section class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> </button>
      <a href="index.php" class="navbar-brand"><img src = "../images/logo.png"  height = "100%" ><img> foodStorks</a> </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li>
        	<a  href="#home" class="smoothScroll">
        	<img width="8px" src="../images/clear.png" />HOME</a>
        </li>
        <li>
        	<a href="#contact" class="smoothScroll">
            <img width="8px" src="../images/clear.png" />CONTACT
            </a>
        </li>
        <li class="dropdown"> 
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
             <?php 
			 	include("connect.php");
				$query = mysqli_query($conn,"select picture from users where email = '$email'")or die(mysql_error());
				$row=mysqli_fetch_array($query);
				
				if($row[0] != NULL){
					?><img width="45px" src=" <?php echo $row[0]; ?>" alt="User Avatar" class="img-circle" /> <?php
				} else {
					?><img width="45px" src="../images/default_profile.jpg" alt="User Avatar" class="img-circle" /> <?php
				}
				mysqli_close($conn);
			?>
            
            
            MY ACCOUNT <i class="fa fa-caret-down"></i> 
            </a>
    <ul class="dropdown-menu dropdown-user">
      <li><a href="#"><i class="fa fa-user fa-fw"></i> Activity</a> </li>
      <li><a href="#"><i class="fa fa-key fa-fw"></i> My Account</a> </li>
      <li><a href="#"><i class="fa fa-key fa-fw"></i> Address Book</a> </li>
      <li class="divider"></li>
      <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
    </ul>
    <!-- /.dropdown-user --> 
  </li>
      </ul>
    </div>
  </div>
</section>
