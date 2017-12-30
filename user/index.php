<?php 
include("header.php");
include("session.php");
include("navbar.php");  
unset($_SESSION["shopping_cart"]);
?>

<!-- home section -->

<section id="home" class="parallax-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <h1>Delicious food is just one click away!</h1>
        <h2>No matter your style, we have food for you</h2>
        <br>
        <center>
          <form action="search.php" method="get">
            <table>
              <tr>
                <td width="300px" ><input class="form-control" type="text" width="100%" name="cities" placeholder="Enter a cities" required></td>
                <td width="20"></td>
                <td width="300px" ><input class="form-control" type="text" width="100%" name="area" placeholder="Enter an area" required></td>
              </tr>
              <tr>
                <td colspan="3"><center>
                    <input type="submit" value="SHOW RESTAURANTS" class="smoothScroll btn btn-default">
                  </center></td>
              </tr>
            </table>
          </form>
        </center>
      </div>
    </div>
  </div>
</section>


<?php include ("footer.php"); ?>