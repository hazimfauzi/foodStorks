<?php 
include('header.php');
include('session.php');
include('navbar.php');
?>
<!-- Page Content -->

<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-plus fa-fw"></i>Add User</h1>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-8">
        <div class="panel panel-info">
          <div class="panel-heading"> Please Enter Details Below... </div>
          <div class="panel-body">
            <form  method="POST" action="save_user.php" enctype="multipart/form-data">
              <div class="form-group">
                <label >First Name *</label>
                <input class="form-control" type="text" id="inputPassword" name="fname"  placeholder="What your first name?" required>
              </div>
              <div class="form-group">
                <label >Last Name *</label>
                <input class="form-control" type="text" id="inputPassword" name="lname"  placeholder="What your last name?" required>
              </div>
              <div class="form-group">
                <label>Password *</label>
                <input class="form-control" type="password" id="pwd" name="password"  placeholder="Shh.... Do not let other people know your password!!!" required>
                <div class="pull-right">
                  <button type="button" onclick="showHide()" class="btn btn-outline btn-primary btn-sm" id="eye"> <i class="fa fa-eye">Show/Hide Password</i> </button>
                </div>
              </div>
              <script> 
									function show() {
										var p = document.getElementById('pwd');
										p.setAttribute('type', 'text');
									}
									
									function hide() {
										var p = document.getElementById('pwd');
										p.setAttribute('type', 'password');
									}
									
									var pwShown = 0;
									
									document.getElementById("eye").addEventListener("click", function () {
										if (pwShown == 0) {
											pwShown = 1;
											show();
										} else {
											pwShown = 0;
											hide();
										}
									}, false);
                                    </script>
              <div class="form-group">
                <label>Email *</label>
                <input class="form-control" type="email" id="imputEmail" name="email" placeholder="What your email?" required>
              </div>
              <div class="form-group">
                <label>Gender</label>
                <select class="form-control" name="gender">
                  <option></option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>
              <div class="form-group">
                <label>Adddress:</label>
                <textarea class="form-control" type="text" id="inputPassword" name="address"  placeholder="Home Address"></textarea>
              </div>
              <div class="form-group">
                <label>Cellphone Number:</label>
                <input class="form-control" type='tel' pattern="[0-9]{10,10}" class="search" name="contact"  placeholder="Phone Number please.."  autocomplete="off"  maxlength="11" >
              </div>
              <div class="pull-right">
                <div class="form-group">
                  <div class="forms">
                    <button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>Save</button>
                    <button type="reset" class="btn btn-danger ">Reset Button</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid --> 
</div>
<!-- /#page-wrapper -->

<?php 
include("footer.php");
?>