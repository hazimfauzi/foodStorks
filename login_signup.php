<?php
$_SESSION['url'] = $_SERVER['REQUEST_URI']; // i.e. "about.php" 
?>
<!---------- Login SIgn Up ---------------------------------------------------------->

<div class="modal fade" id="signup" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="panel-body"> 
          <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li><a href="#signup1" data-toggle="tab">
              <h4><strong>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Sign Up &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </strong></h4>
              </a> </li>
            <li class="active"><a href="#login" data-toggle="tab">
              <h4><strong>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Log In &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </strong></h4>
              </a> </li>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane fade in active" id="login">
              <table width="100%">
                <tr>
                  <td height="20px"></td>
                </tr>
                <tr>
                  <td colspan="3"><?php include('fb.php'); ?>
                  </td>
                
                  </tr>
                
                <tr>
                  <td height="20px"></td>
                </tr>
                <tr>
                  <td colspan="3"><p>------------------------------------------- OR --------------------------------------------</p></td>
                </tr>
                <form method="post" action="login.php">
                  <tr>
                    <td colspan="3">
                    	<input class="form-control" type="email" name="email" placeholder="Email" required="required">
                    	<input class="form-control" type="hidden" name="url" value="<?php echo $_SESSION['url']; ?>">
                    </td>
                  </tr>
                  <tr>
                    <td height="20px"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><input class="form-control" type="password" name="password" placeholder="Password" required="required"></td>
                  </tr>
                  <tr>
                    <td height="20px"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td class="pull-right"><a href="forgot_pass.php" class="list-inline">Forgot your password?</a></td>
                    <td width="10"></td>
                  </tr>
                  <tr>
                    <td height="20px"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><input type="submit" class="btn btn-success btn-lg btn-block" value="Login"  /></td>
                  </tr>
                </form>
                <tr>
                  <td></td>
                </tr>
              </table>
            </div>
            <div class="tab-pane fade " id="signup1">
              <table width="100%">
                <tr>
                  <td height="20px"></td>
                </tr>
                <form method="post" action="signup.php">
                  <tr>
                    <td><input class="form-control" type="text" name="fname" placeholder="First Name"></td>
                    <td width="20"></td>
                    <td><input class="form-control" type="text" name="lname" placeholder="Last Name"></td>
                  </tr>
                  <tr>
                    <td height="20px"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><input class="form-control" name="contact" type="text" placeholder="Phone Number"></td>
                  </tr>
                  <tr>
                    <td height="20px"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><input class="form-control"  name="email" type="email" placeholder="Email"></td>
                  </tr>
                  <tr>
                    <td height="20px"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><table width="100%">
                        <tr>
                          <td width="89%"><input class="form-control" type="password" id="password" name="password" placeholder="Password"></td>
                          <td width="20px"></td>
                          <td><button type="button" onclick="showHide()" class="btn btn-outline btn-primary btn-sm" id="eye"><i class="fa fa-eye"></i></button></td>
                          <script> 
									function show() {
										var p = document.getElementById('password');
										p.setAttribute('type', 'text');
									}
									
									function hide() {
										var p = document.getElementById('password');
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
                        </tr>
                      </table>
                    <td>
                  </tr>
                  <tr>
                    <td height="20px"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><input type="submit" value="Sign Up" class="btn btn-success btn-lg btn-block" /></td>
                  </tr>
                </form>
                <tr>
                  <td></td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel --> 
        
      </div>
    </div>
  </div>
</div>
