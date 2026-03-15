<?php
session_start();
error_reporting(0);
require_once('include/config.php');
if(strlen( $_SESSION["uid"])==0)
    {   
header('location:index.php');
}
else{


if(isset($_POST['submit']))
{
$uid=$_SESSION['uid'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$city=$_POST['city'];
$state=$_POST['state'];
$address=$_POST['address'];
$sql="update tbluser set fname=:fname,lname=:lname,mobile=:mobile,city=:city,state=:state,address=:Address where id=:uid";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':state',$state,PDO::PARAM_STR);
$query->bindParam(':Address',$address,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
//$msg="<script>toastr.success('Mobile info updated Successfully', {timeOut: 5000})</script>";
echo "<script>alert('Profile has been updated.');</script>";
echo "<script> window.location.href =profile.php;</script>";

}


 ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>MacroFlex | User Profile</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>

</head>
<body>
	<!-- Page Preloder -->
	

	<!-- Header Section -->
	<?php include 'include/header.php';?>
	<!-- Header Section end -->

	
	                                                                              
	<!-- Page top Section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
					<h2>Profile</h2>
				</div>
			</div>
		</div>
	</section>
	<!-- Page top Section end -->

	<!-- Contact Section -->
	<section class="contact-page-section spad overflow-hidden">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-2">
				</div>
				<div class="col-lg-8">
					<form class="singup-form contact-form" method="post">
						<div class="row">
							<?php 
							$uid=$_SESSION['uid'];
							$sql ="SELECT id, fname, lname, email, mobile, password, address,state,city, create_date from tbluser where id=:uid ";
							$query= $dbh -> prepare($sql);
							$query->bindParam(':uid',$uid, PDO::PARAM_STR);
							$query-> execute();
							$results = $query -> fetchAll(PDO::FETCH_OBJ);
							$cnt=1;
							if($query->rowCount() > 0)
							{
							foreach($results as $result)
							{				?>	
							<div class="col-md-6">
								<input type="text" name="fname" id="fname" placeholder="First Name" autocomplete="off" value="<?php echo $result->fname;?>">
							</div>
							<div class="col-md-6">
								<input type="text" name="lname" id="lname" placeholder="Last Name" autocomplete="off" value="<?php echo $result->lname;?>">
							</div>
							<div class="col-md-6">
								<input type="text" name="email" id="email" placeholder="Your Email" autocomplete="off" value="<?php echo $result->email;?>" readonly>
							</div>
							<div class="col-md-6">
								<input type="text" name="mobile" id="mobile" placeholder="Mobile Number" autocomplete="off" value="<?php echo $result->mobile;?>">
							</div>
							<div class="col-md-6">
								<!-- <input type="text" name="state" id="state" placeholder="State" autocomplete="off" value="<?php echo $result->state;?>"> -->
								<select name="state">
									<option value="Andhra Pradesh" <?php if ($result->state == "Andhra Pradesh") echo "selected"; ?>>Andhra Pradesh</option>
									<option value="Arunachal Pradesh" <?php if ($result->state == "Arunachal Pradesh") echo "selected"; ?>>Arunachal Pradesh</option>
									<option value="Assam" <?php if ($result->state == "Assam") echo "selected"; ?>>Assam</option>
									<option value="Bihar" <?php if ($result->state == "Bihar") echo "selected"; ?>>Bihar</option>
									<option value="Chhattisgarh" <?php if ($result->state == "Chhattisgarh") echo "selected"; ?>>Chhattisgarh</option>
									<option value="Goa" <?php if ($result->state == "Goa") echo "selected"; ?>>Goa</option>
									<option value="Gujarat" <?php if ($result->state == "Gujarat") echo "selected"; ?>>Gujarat</option>
									<option value="Haryana" <?php if ($result->state == "Haryana") echo "selected"; ?>>Haryana</option>
									<option value="Himachal Pradesh" <?php if ($result->state == "Himachal Pradesh") echo "selected"; ?>>Himachal Pradesh</option>
									<option value="Jharkhand" <?php if ($result->state == "Jharkhand") echo "selected"; ?>>Jharkhand</option>
									<option value="Karnataka" <?php if ($result->state == "Karnataka") echo "selected"; ?>>Karnataka</option>
									<option value="Kerala" <?php if ($result->state == "Kerala") echo "selected"; ?>>Kerala</option>
									<option value="Madhya Pradesh" <?php if ($result->state == "Madhya Pradesh") echo "selected"; ?>>Madhya Pradesh</option>
									<option value="Maharashtra" <?php if ($result->state == "Maharashtra") echo "selected"; ?>>Maharashtra</option>
									<option value="Manipur" <?php if ($result->state == "Manipur") echo "selected"; ?>>Manipur</option>
									<option value="Meghalaya" <?php if ($result->state == "Meghalaya") echo "selected"; ?>>Meghalaya</option>
									<option value="Mizoram" <?php if ($result->state == "Mizoram") echo "selected"; ?>>Mizoram</option>
									<option value="Nagaland" <?php if ($result->state == "Nagaland") echo "selected"; ?>>Nagaland</option>
									<option value="Odisha" <?php if ($result->state == "Odisha") echo "selected"; ?>>Odisha</option>
									<option value="Punjab" <?php if ($result->state == "Punjab") echo "selected"; ?>>Punjab</option>
									<option value="Rajasthan" <?php if ($result->state == "Rajasthan") echo "selected"; ?>>Rajasthan</option>
									<option value="Sikkim" <?php if ($result->state == "Sikkim") echo "selected"; ?>>Sikkim</option>
									<option value="Tamil Nadu" <?php if ($result->state == "Tamil Nadu") echo "selected"; ?>>Tamil Nadu</option>
									<option value="Telangana" <?php if ($result->state == "Telangana") echo "selected"; ?>>Telangana</option>
									<option value="Tripura" <?php if ($result->state == "Tripura") echo "selected"; ?>>Tripura</option>
									<option value="Uttar Pradesh" <?php if ($result->state == "Uttar Pradesh") echo "selected"; ?>>Uttar Pradesh</option>
									<option value="Uttarakhand" <?php if ($result->state == "Uttarakhand") echo "selected"; ?>>Uttarakhand</option>
									<option value="West Bengal" <?php if ($result->state == "West Bengal") echo "selected"; ?>>West Bengal</option>
									<option value="Andaman and Nicobar Islands" <?php if ($result->state == "Andaman and Nicobar Islands") echo "selected"; ?>>Andaman and Nicobar Islands</option>
									<option value="Chandigarh" <?php if ($result->state == "Chandigarh") echo "selected"; ?>>Chandigarh</option>
									<option value="Dadra and Nagar Haveli" <?php if ($result->state == "Dadra and Nagar Haveli") echo "selected"; ?>>Dadra and Nagar Haveli</option>
									<option value="Daman and Diu" <?php if ($result->state == "Daman and Diu") echo "selected"; ?>>Daman and Diu</option>
									<option value="Delhi" <?php if ($result->state == "Delhi") echo "selected"; ?>>Delhi</option>
									<option value="Lakshadweep" <?php if ($result->state == "Lakshadweep") echo "selected"; ?>>Lakshadweep</option>
									<option value="Puducherry" <?php if ($result->state == "Puducherry") echo "selected"; ?>>Puducherry</option>
								</select>

							</div>
							<div class="col-md-6">
								<input type="text" name="city" id="city" placeholder="City" autocomplete="off" value="<?php echo $result->city;?>">
							</div>
							
							<div class="col-md-12">
								<input type="text" name="address" id="address" placeholder="Address" autocomplete="off" value="<?php echo $result->address;?>">
							</div>
							<div class="col-md-12">
						<input type="submit" id="submit" name="submit" value="Update" class="site-btn sb-gradient">
								
							</div>
							<?php }} ?>
						</div>
					</form>
				</div>
				<div class="col-lg-2">
				</div>
			</div>
		</div>
	</section>
	<!-- Trainers Section end -->
<?php include 'include/footer.php'; ?>
	<!-- Footer Section end -->
	
	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

	<!-- Search model -->
	
	<!-- Search model end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
 <?php } ?>

  <style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #dd3d36;
    color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #5cb85c;
    color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
