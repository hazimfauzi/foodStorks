<?php 
include("header.php");
include_once("session.php");
if(!isset($_SESSION['email'])){
	include("navbar1.php"); 
	include("login_signup.php"); 
} else {
	include("connect.php");
	$email=$_SESSION['email'];
	$sql = "SELECT * FROM users WHERE email='$email'";
	$result = mysqli_query($conn,$sql)or die(mysql_error());
	$row = mysqli_fetch_array($result);
	
	if( $row['oauth_provider'] == 'facebook' ){
		include("navbar.php"); 
	}else {
	if( $row['level'] == 'admin' ) {
		header('Location:admin/index.php');
		exit();
	} else if( $row['level'] == 'user' ) {
		include("navbar.php"); 
	} else if( $row['level'] == 'manager' ) {
		header('Location:manager/index.php');
		exit();
	}}
}

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
                <td width="300px" ><input class="form-control" type="text" width="100%" name="state" placeholder="Enter a state" required></td>
                <td width="20"></td>
                <td width="300px" ><input class="form-control" type="text" width="100%" name="city" placeholder="Enter an cities" required></td>
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

<!-- gallery section -->
<section id="gallery" class="parallax-section">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
        <h1 class="heading">Food Gallery</h1>
        <hr>
      </div>
      <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s"> <a href="images/gallery-img1.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/gallery-img1.jpg" alt="gallery img"></a>
        <div>
          <h3>Lemon-Rosemary Prawn</h3>
          <span>Seafood / Shrimp / Lemon</span> </div>
        <a href="images/gallery-img2.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/gallery-img2.jpg" alt="gallery img"></a>
        <div>
          <h3>Lemon-Rosemary Vegetables</h3>
          <span>Tomato / Rosemary / Lemon</span> </div>
      </div>
      <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s"> <a href="images/gallery-img3.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/gallery-img3.jpg" alt="gallery img"></a>
        <div>
          <h3>Lemon-Rosemary Bakery</h3>
          <span>Bread / Rosemary / Orange</span> </div>
      </div>
      <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.9s"> <a href="images/gallery-img4.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/gallery-img4.jpg" alt="gallery img"></a>
        <div>
          <h3>Lemon-Rosemary Salad</h3>
          <span>Chicken / Rosemary / Green</span> </div>
        <a href="images/gallery-img5.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/gallery-img5.jpg" alt="gallery img"></a>
        <div>
          <h3>Lemon-Rosemary Pizza</h3>
          <span>Pasta / Rosemary / Green</span> </div>
      </div>
    </div>
  </div>
</section>

<!-- menu section -->
<section id="menu" class="parallax-section">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
        <h1 class="heading">Special Menu</h1>
        <hr>
      </div>
      <div class="col-md-6 col-sm-6">
        <h4>Lemon-Rosemary Vegetable ................ <span>$20.50</span></h4>
        <h5>Chicken / Rosemary / Lemon</h5>
      </div>
      <div class="col-md-6 col-sm-6">
        <h4>Lemon-Rosemary Meat ........................... <span>$30.50</span></h4>
        <h5>Meat / Rosemary / Lemon</h5>
      </div>
      <div class="col-md-6 col-sm-6">
        <h4>Lemon-Rosemary Pork ........................ <span>$40.75</span></h4>
        <h5>Pork / Tooplate / Lemon</h5>
      </div>
      <div class="col-md-6 col-sm-6">
        <h4>Orange-Rosemary Salad .......................... <span>$55.00</span></h4>
        <h5>Salad / Rosemary / Orange</h5>
      </div>
      <div class="col-md-6 col-sm-6">
        <h4>Lemon-Rosemary Squid ...................... <span>$65.00</span></h4>
        <h5>Squid / Rosemary / Lemon</h5>
      </div>
      <div class="col-md-6 col-sm-6">
        <h4>Orange-Rosemary Shrimp ........................ <span>$70.50</span></h4>
        <h5>Shrimp / Rosemary / Orange</h5>
      </div>
      <div class="col-md-6 col-sm-6">
        <h4>Lemon-Rosemary Prawn ................... <span>$110.75</span></h4>
        <h5>Chicken / Rosemary / Lemon</h5>
      </div>
      <div class="col-md-6 col-sm-6">
        <h4>Lemon-Rosemary Seafood ..................... <span>$220.50</span></h4>
        <h5>Seafood / Rosemary / Lemon</h5>
      </div>
    </div>
  </div>
</section>

<center><img src="images/ALL-IN-ONE RESTAURANT MANAGEMENT SYSTE,M.jpg" width="80%"  /></center>


<!-- contact section -->
<section id="contact" class="parallax-section">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-1 col-md-10 col-sm-12 text-center">
        <h1 class="heading">Contact Us</h1>
        <hr>
      </div>
      <div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeIn" data-wow-delay="0.9s">
        <form action="#" method="post">
          <div class="col-md-6 col-sm-6">
            <input name="name" type="text" class="form-control" id="name" placeholder="Name">
          </div>
          <div class="col-md-6 col-sm-6">
            <input name="email" type="email" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="col-md-12 col-sm-12">
            <textarea name="message" rows="8" class="form-control" id="message" placeholder="Message"></textarea>
          </div>
          <div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
            <input name="submit" type="submit" class="form-control" id="submit" value="make a reservation">
          </div>
        </form>
      </div>
      <div class="col-md-2 col-sm-1"></div>
    </div>
  </div>
</section>

<!-- footer section -->
<footer class="parallax-section">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
        <h2 class="heading">Contact Info.</h2>
        <div class="ph">
          <p><i class="fa fa-phone"></i> Phone</p>
          <h4>090-080-0760</h4>
        </div>
        <div class="address">
          <p><i class="fa fa-map-marker"></i> Our Location</p>
          <h4>120 Duis aute irure, California, USA</h4>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
        <h2 class="heading">Open Hours</h2>
        <p>Sunday <span>10:30 AM - 10:00 PM</span></p>
        <p>Mon-Fri <span>9:00 AM - 8:00 PM</span></p>
        <p>Saturday <span>11:30 AM - 10:00 PM</span></p>
      </div>
      <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
        <h2 class="heading">Follow Us</h2>
        <ul class="social-icon">
          <li><a href="#" class="fa fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li>
          <li><a href="#" class="fa fa-twitter wow bounceIn" data-wow-delay="0.6s"></a></li>
          <li><a href="#" class="fa fa-behance wow bounceIn" data-wow-delay="0.9s"></a></li>
          <li><a href="#" class="fa fa-dribbble wow bounceIn" data-wow-delay="0.9s"></a></li>
          <li><a href="#" class="fa fa-github wow bounceIn" data-wow-delay="0.9s"></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<?php include ("footer.php"); ?>