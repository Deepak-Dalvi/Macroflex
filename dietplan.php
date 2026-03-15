<?php 
session_start();
error_reporting(0);
include 'include/config.php';
$uid=$_SESSION['uid'];
// $bmr=$_POST['bmr'];
    $query = "select id, fname, lname, email, mobile, password, address,calorieGoal, create_date, gender, age, height, weight, remainingCalories , activityPoint from tbluser where id=$uid";
//  print_r($query); die;
    $stmt = $dbh->prepare($query);
    // $stmt->bindParam('email', $email, PDO::PARAM_STR);
    // $stmt->bindValue('password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    $row   = $stmt->fetch(PDO::FETCH_ASSOC);
    if (isset($row['age']) && isset($row['height']) && isset($row['weight'])) {
            $height=$row['height']/100;
        // $bmi = $row['weight'] / ($height * $height);
		$goal= (10 * $row['weight'] + 6.25 * $height - 5 * $row['age'] + 5) * $row['activityPoint'] ;
		// $goal= (10 * $row['weight'] + 6.25 * $height - 5 * $row['age'] + 5);
    }


	if(isset($row['remainingCalories'])){
		$remaningCalories = $row['remainingCalories'];
	}else{
		if(isset($row['calorieGoal'])){
			$remaningCalories = $row['calorieGoal'] ;	
		}else{
			$remaningCalories = $goal;
		}
	}

	if(isset($row['calorieGoal'])){
		$calorieGoal = $row['calorieGoal'];
	}else{
		$calorieGoal = $goal;
	}

	
	if(isset($_POST['submit']) && isset($_POST['bmr']))
	{ 
		$goal=$_POST['bmr'];
		$sql="UPDATE tbluser SET remainingCalories = '$goal' where id = $uid";

		$query = $dbh -> prepare($sql);
		$query -> execute();
		echo "<script>alert('saved successfully ........');</script>";
		header("location: dietplan.php");
		// echo "<script>window.location.href='booking-history.php'</script>";
	}

	if(isset($_POST['submit']) && isset($_POST['calorieLoose']))
	{
		// print_r("ccccccccccccc"); die; 
		$calorieGoal=$_POST['calorieLoose'] - 500;
		// print_r($calorieGoal); die;
		$sql="UPDATE tbluser SET calorieGoal = '$calorieGoal' where id = $uid";
		$query = $dbh -> prepare($sql);
		$query -> execute();
		echo "<script>alert('saved successfully ........');</script>";
		header("location: dietplan.php");
		// echo "<script>window.location.href='booking-history.php'</script>";
	}

	if(isset($_POST['submit']) && isset($_POST['calorieGain']))
	{ 
		$calorieGoal=$_POST['calorieGain'];
		// print_r($calorieGoal); 
		// print_r('======='); 
		$calorieGoal = floatval($calorieGoal) + 500;
		// print_r($calorieGoal); die;
		$sql="UPDATE tbluser SET calorieGoal = '$calorieGoal' where id = $uid";

		$query = $dbh -> prepare($sql);
		$query -> execute();
		echo "<script>alert('saved successfully ........');</script>";
		header("location: dietplan.php");
		// echo "<script>window.location.href='booking-history.php'</script>";
	}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>MacroFlex</title>
	<meta charset="UTF-8">
	<meta name="description" content="Ahana Yoga HTML Template">
	<meta name="keywords" content="yoga, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/dashboard.css"/>

</head>
<body>
	<!-- Page Preloder -->
	

	<!-- Header Section -->
	<?php include 'include/header.php';?>
	<!-- Header Section end -->

	

	                                                                              
	<!-- Page top Section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<input type="hidden"  id="goal" value=<?php echo $calorieGoal?>>
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
                    <?php 
                        if($bmi<18.5){
                    ?>
                       <h2>Diet Plan </h2>
                    <?php } ?> 
                                        <?php 
                        if ($bmi >= 18.5 && $bmi < 24.9) {
                    ?>
                          <h2>Diet Plan h2>
                    <?php } ?>  
                    <?php 
                      if ($bmi >= 25 && $bmi < 29.9) {
                    ?>
                          <h2>Diet Plan </h2>
                    <?php } ?>  
                    <?php 
                        if ($bmi >= 30) {
                    ?>
                        <h2>Diet Plan h2> 
                    <?php } ?>  
				</div>
			</div>
		</div>
	</section>



	<!-- Pricing Section -->
	<section class="pricing-section">
		<div class="container">
            <div  class = "diet-container" id="headingContainer"> Calorie goal -> <?php echo $calorieGoal ?> calorie/day     <input type="button" class = "calc-btn-diet " value = ""></div>
            <div class = "diet-container">  
                    <input type="button" value = "maintain" class = "calc-btn-diet ">
                   <div> 
						<form method="POST">	
							<input type="hidden" name="calorieGain" value =<?php echo $goal ?> >
							<input type="submit" name="submit" value = "Gain"  class = "calc-btn-diet">
						</form>		  
						<div>0.5kg/week </div> 
					</div>
                   <div> 
						<form method="POST">	
							<input type="hidden" name="calorieLoose" value =<?php echo $goal ?> >
							<input type="submit" name="submit" value = "Loose"  class = "calc-btn-diet">
						</form>		  
						<div>0.5kg/week </div> 
					</div>
            </div>
            <div> 
                 <div class="food-container"> 
                   <div class="add-food-container add-food-heading"> Add Food <i class="fa fa-plus" aria-hidden="true"></i> </div>
                   <div class="container-food"> 
						<div class="add-food-container">  <div>Dahi (100 calorie) </div> <i class="fa fa-plus incrementBtn" aria-hidden="true"></i> <i class="fa fa-minus decrementBtn" aria-hidden="true"></i></div>  
						  <span class="variableContainer"></span>
				   </div>
					<div class="container-food"> 
						<div class="add-food-container"> Rice (50 calorie) <i class="fa fa-plus incrementBtn" aria-hidden="true"></i> <i class="fa fa-minus decrementBtn" aria-hidden="true"></i></div> 
						<span class="variableContainer"></span> 
					</div>
					<div class="container-food"> 
						<div class="add-food-container">  <div>Soya (42 calorie) </div> <i class="fa fa-plus incrementBtn" aria-hidden="true"></i> <i class="fa fa-minus decrementBtn" aria-hidden="true"></i></div>  
						  <span class="variableContainer"></span>
				   </div>
				   <div class="container-food"> 
						<div class="add-food-container">  <div>Chapati (35 calorie) </div> <i class="fa fa-plus incrementBtn" aria-hidden="true"></i> <i class="fa fa-minus decrementBtn" aria-hidden="true"></i></div>  
						  <span class="variableContainer"></span>
				   </div>
                </div>   
                
                
                <!-- <div>Select a Food Item:</div>

                <select id="foodDropdown">
                <option value="">Choose a food item</option>
                <option value="Basmati Rice">Basmati Rice - 35 calories</option>
                <option value="Brown Rice">Brown Rice - 35 calories</option>
                <option value="White Rice">White Rice - 35 calories</option>
                <option value="Chapati">Chapati (Roti) - 24 calories</option>
                <option value="Paratha">Paratha - 39 calories</option>
                <option value="Puri">Puri - 67 calories</option>
                <option value="Naan">Naan - 55 calories</option>
                <option value="Dosa">Dosa - 46 calories</option>
                <option value="Idli">Idli - 26 calories</option>
                <option value="Uttapam">Uttapam - 32 calories</option>
                <option value="Upma">Upma - 46 calories</option>
                <option value="Poha">Poha (Flattened Rice) - 35 calories</option>
                <option value="Khichdi">Khichdi - 33 calories</option>
                <option value="Samosa">Samosa - 67 calories</option>
                <option value="Pakora">Pakora (Vegetable Fritters) - 63 calories</option>
                <option value="Dhokla">Dhokla - 32 calories</option>
                <option value="Kachori">Kachori - 71 calories</option>
                <option value="Aloo Tikki">Aloo Tikki (Potato Cutlet) - 68 calories</option>
                <option value="Chole">Chole (Chickpea Curry) - 38 calories</option>
                <option value="Rajma">Rajma (Kidney Bean Curry) - 35 calories</option>
                <option value="Dal Tadka">Dal Tadka - 31 calories</option>
                <option value="Paneer Tikka">Paneer Tikka - 46 calories</option>
                <option value="Aloo Gobi">Aloo Gobi (Potato and Cauliflower Curry) - 29 calories</option>
                <option value="Palak Paneer">Palak Paneer (Spinach and Cottage Cheese Curry) - 46 calories</option>
                <option value="Baingan Bharta">Baingan Bharta (Smoked Eggplant Curry) - 22 calories</option>
                <option value="Vegetable Biryani">Vegetable Biryani - 39 calories</option>
                <option value="Vegetable Pulao">Vegetable Pulao - 40 calories</option>
                <option value="Navratan Korma">Navratan Korma (Mixed Vegetable Curry) - 41 calories</option>
                <option value="Malai Kofta">Malai Kofta (Vegetable Dumplings in Creamy Sauce) - 47 calories</option>
                <option value="Bhindi Masala">Bhindi Masala (Okra Curry) - 21 calories</option>
                <option value="Aloo Matar">Aloo Matar (Potato and Peas Curry) - 27 calories</option>
                <option value="Mushroom Masala">Mushroom Masala - 22 calories</option>
                <option value="Matar Paneer">Matar Paneer (Peas and Cottage Cheese Curry) - 42 calories</option>
                <option value="Dum Aloo">Dum Aloo (Potato Curry) - 34 calories</option>
                <option value="Veg Manchurian">Veg Manchurian - 53 calories</option>
                <option value="Vegetable Fried Rice">Vegetable Fried Rice - 37 calories</option>
                <option value="Vegetable Noodles">Vegetable Noodles - 42 calories</option>
                <option value="Paneer Butter Masala">Paneer Butter Masala - 48 calories</option>
                <option value="Aloo Jeera">Aloo Jeera (Cumin Potatoes) - 25 calories</option>
                <option value="Mixed Vegetable Sabzi">Mixed Vegetable Sabzi - 31 calories</option>
                <option value="Palak">Palak (Spinach) - 23 calories</option>
                <option value="Methi">Methi (Fenugreek Leaves) - 17 calories</option>
                <option value="Cabbage Sabzi">Cabbage Sabzi - 16 calories</option>
                <option value="Gajar Matar">Gajar Matar (Carrots and Peas) - 24 calories</option>
                <option value="Lauki">Lauki (Bottle Gourd) - 12 calories</option>
                <option value="Tinda">Tinda (Indian Baby Pumpkin) - 15 calories</option>
                <option value="Karela">Karela (Bitter Gourd) - 17 calories</option>
                <option value="Baingan">Baingan (Eggplant) - 18 calories</option>
                <option value="Turai">Turai (Ridge Gourd) - 14 calories</option>
                <option value="Bhindi">Bhindi (Okra) - 20 calories</option>
                <option value="Chicken Breast (Skinless, Boneless) - 25 calories">Chicken Breast (Skinless, Boneless) - 25 calories</option>
                <option value="Chicken Thigh (Skinless, Boneless) - 31 calories">Chicken Thigh (Skinless, Boneless) - 31 calories</option>
                <option value="Chicken Drumstick (Skinless) - 30 calories">Chicken Drumstick (Skinless) - 30 calories</option>
                <option value="Chicken Wings - 28 calories">Chicken Wings - 28 calories</option>
                <option value="Chicken Liver - 44 calories">Chicken Liver - 44 calories</option>
                <option value="Chicken Heart - 44 calories">Chicken Heart - 44 calories</option>
                <option value="Chicken Gizzard - 33 calories">Chicken Gizzard - 33 calories</option>
                <option value="Chicken Skin - 86 calories">Chicken Skin - 86 calories</option>
                <option value="Chicken Soup (with Meat and Broth) - 20 calories">Chicken Soup (with Meat and Broth) - 20 calories</option>
                <option value="Mutton (Goat Meat) - 32 calories">Mutton (Goat Meat) - 32 calories</option>
                <option value="Lamb (Lean Cuts) - 35 calories">Lamb (Lean Cuts) - 35 calories</option>
                <option value="Beef (Lean Cuts) - 36 calories">Beef (Lean Cuts) - 36 calories</option>
                <option value="Pork (Lean Cuts) - 37 calories">Pork (Lean Cuts) - 37 calories</option>
                <option value="Turkey Breast (Skinless, Boneless) - 29 calories">Turkey Breast (Skinless, Boneless) - 29 calories</option>
                <option value="Turkey Thigh (Skinless, Boneless) - 33 calories">Turkey Thigh (Skinless, Boneless) - 33 calories</option>
                <option value="Duck Breast (Skinless, Boneless) - 27 calories">Duck Breast (Skinless, Boneless) - 27 calories</option>
                <option value="Duck Leg (Skinless) - 34 calories">Duck Leg (Skinless) - 34 calories</option>
                <option value="Quail (Skinless) - 26 calories">Quail (Skinless) - 26 calories</option>
                <option value="Rabbit (Skinless) - 31 calories">Rabbit (Skinless) - 31 calories</option>
                <option value="Venison (Deer Meat) - 36 calories">Venison (Deer Meat) - 36 calories</option>
                <option value="Salmon - 50 calories">Salmon - 50 calories</option>
                <option value="Tuna - 28 calories">Tuna - 28 calories</option>
                <option value="Cod - 26 calories">Cod - 26 calories</option>
                <option value="Sardines - 42 calories">Sardines - 42 calories</option>
                <option value="Haddock - 25 calories">Haddock - 25 calories</option>
                <option value="Tilapia - 26 calories">Tilapia - 26 calories</option>
                <option value="Catfish - 34 calories">Catfish - 34 calories</option>
                <option value="Shrimp (Prawns) - 27 calories">Shrimp (Prawns) - 27 calories</option>
                <option value="Crab - 29 calories">Crab - 29 calories</option>
                <option value="Lobster - 28 calories">Lobster - 28 calories</option>
                <option value="Clams - 31 calories">Clams - 31 calories</option>
                <option value="Mussels - 35 calories">Mussels - 35 calories</option>
                <option value="Squid - 26 calories">Squid - 26 calories</option>
                <option value="Octopus - 30 calories">Octopus - 30 calories</option>
                <option value="Scallops - 33 calories">Scallops - 33 calories</option>
                <option value="Anchovies - 29 calories">Anchovies - 29 calories</option>
                <option value="Oysters - 30 calories">Oysters - 30 calories</option>
                <option value="Eel - 30 calories">Eel - 30 calories</option>
                <option value="Snakehead Fish (Channa) - 31 calories">Snakehead Fish (Channa) - 31 calories</option>
                <option value="Bombay Duck (Bombil) - 40 calories">Bombay Duck (Bombil) - 40 calories</option>
                <option value="Pomfret - 33 calories">Pomfret - 33 calories</option>
                <option value="Rohu - 32 calories">Rohu - 32 calories</option>
                <option value="Catla - 33 calories">Catla - 33 calories</option>
                <option value="Hilsa (Ilish) - 35 calories">Hilsa (Ilish) - 35 calories</option>
                <option value="Kingfish (Surmai) - 42 calories">Kingfish (Surmai) - 42 calories</option>
                <option value="Pabda Fish - 36 calories">Pabda Fish - 36 calories</option>
                <option value="Barramundi (Bhetki) - 37 calories">Barramundi (Bhetki) - 37 calories</option>
                <option value="Rohu Fish Head - 41 calories">Rohu Fish Head - 41 calories</option>
                <option value="Mackerel (Bangda) - 44 calories">Mackerel (Bangda) - 44 calories</option>
                <option value="Butterfish (Pompano) - 39 calories">Butterfish (Pompano) - 39 calories</option>
                </select> -->

            </div>
            <div class = "center-content"> 
				Calorie Remaining  -> 
				<span id="calorieContainer"> <?php echo $remaningCalories ?></span>  
				<form method="POST"  id = "myForm">
					<input type="hidden" id="bmr" name="bmr" value=<?php echo $goal?>>
					<input type="submit" name="submit" value="Save" class="calc-btn-diet food-container" >
				</form>

		    </div>
		</div>
	</section>



	<script> 
	document.addEventListener('DOMContentLoaded', function() {
		// Get references to buttons and containers
		var incrementBtns = document.querySelectorAll('.incrementBtn');
		var decrementBtns = document.querySelectorAll('.decrementBtn');
		var calorieContainer = document.getElementById('calorieContainer');
		var variableContainers = document.querySelectorAll('.variableContainer');
		var calorieGoal = parseFloat(document.getElementById('goal').value);
		var totalCalorie = 0;

		// Initialize click count for each food item
		var clickCounts = Array.from({ length: incrementBtns.length }, () => 0);

		// Add event listeners to each increment button
		incrementBtns.forEach((btn, index) => {
			btn.addEventListener('click', function() {
				clickCounts[index]++;
				var calorieCount = 100 * clickCounts[index];
				variableContainers[index].textContent = calorieCount;
				// totalCalorie += 100;
				// Ensure total calorie does not exceed calorie goal
				if (calorieCount > calorieGoal) {
					calorieCount = calorieGoal;
				}	
				calorieContainer.innerHTML = calorieGoal - calorieCount;
				document.getElementById('bmr').value = calorieGoal - calorieCount;
			});
		});


		// Add event listeners to each decrement button
		decrementBtns.forEach((btn, index) => {
			btn.addEventListener('click', function() {
				clickCounts[index]--;
				if (clickCounts[index] < 0 ) {
					clickCounts[index] = 0
				}
				var calorieCount = 100 * clickCounts[index];
				console.log('sssss', calorieCount);
				variableContainers[index].textContent = calorieCount;
				totalCalorie -= 100;

				// Ensure total calorie does not become negative
				if (totalCalorie < 0) {
					totalCalorie = 0;
				}
				calorieContainer.innerHTML = calorieGoal - totalCalorie;
				document.getElementById('bmr').value = calorieGoal - totalCalorie;
			});
		});
	});
</script>


   
	<!-- Footer Section -->
	<?php include 'include/footer.php'; ?>
	<!-- Footer Section end -->

	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

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
