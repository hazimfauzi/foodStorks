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
        <h1 class="page-header"><i class="fa fa-plus fa-fw"></i>Add Restaurant</h1>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-8">
        <div class="panel panel-info">
          <div class="panel-heading"> Please Enter Details Below... </div>
          <div class="panel-body">
            <form  method="POST" action="save_rest.php" enctype="multipart/form-data">
              <div class="form-group">
                <label >Restaurant Name *</label>
                <input class="form-control" type="text" id="inputPassword" name="rest_name"  placeholder="What your restaurant name?" required>
              </div>
              <div class="form-group">
                <label>Adddress *</label>
                <textarea class="form-control" type="text" id="inputPassword" name="rest_address"  placeholder="Restaurant Address?" required="required"></textarea>
              </div>
              <div class="form-group">
                <label>Postcode *</label>
                <input class="form-control" type="text" id="inputPassword" name="rest_postcode"  placeholder="Restaurant Postcode?" required="required">
              </div>
              <div class="form-group">
                <label >City *</label>
                <input class="form-control" type="text" id="inputPassword" name="rest_city"  placeholder="Restaurant Area?" required>
              </div>
              <div class="form-group">
                <label >State *</label>
                <input class="form-control" type="text" id="inputPassword" name="rest_state"  placeholder="Restaurant City?" required>
              </div>
              <div class="form-group">
                <label >Restaurant Contact Number *</label>
                <input class="form-control" type="text" id="inputPassword" name="rest_contact"  placeholder="What your restaurant contact number?" required>
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