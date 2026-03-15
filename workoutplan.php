<?php 
session_start();
error_reporting(0);
include 'include/config.php';
$uid=$_SESSION['uid'];
 $query = "select id, fname, lname, email, mobile, password, address, create_date, gender, age, height, weight from tbluser where id=$uid";
//  print_r($query); die;
    $stmt = $dbh->prepare($query);
    // $stmt->bindParam('email', $email, PDO::PARAM_STR);
    // $stmt->bindValue('password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    $row   = $stmt->fetch(PDO::FETCH_ASSOC);
    if (isset($row['age']) && isset($row['height']) && isset($row['weight'])) {
            $height=$row['height']/100;
        $bmi = $row['weight'] / ($height * $height);
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
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
                    <?php 
                        if($bmi<18.5){
                    ?>
                          <h2>Workout Plan (Underweight Category  : ( 3 set 8-12 reps))</h2>
                    <?php } ?> 
                                        <?php 
                        if ($bmi >= 18.5 && $bmi < 24.9) {
                    ?>
                          <h2>Workout Plan (Healthy weight : (4 set- 12 reps))</h2>
                    <?php } ?>  
                    <?php 
                      if ($bmi >= 25 && $bmi < 29.9) {
                    ?>
                          <h2>Workout Plan (At a risk of Overweight - (4 sets-8-15 reps) )</h2>
                    <?php } ?>  
                    <?php 
                        if ($bmi >= 30) {
                    ?>
                          <h2>Workout Plan (Overweight - (4 sets- 8- 15 reps))</h2>
                    <?php } ?>  
				</div>
			</div>
		</div>
	</section>



	<!-- Pricing Section -->
	<section class="pricing-section">
		<div class="container">

        <?php 
            if($bmi<18.5){
        ?>
                <div class="center-content"><h2></h2></div>
            
            <div class="days">
                <div>
                    <h3>Leg Exercises</h3>
                    <ol>
                        <li>Squats</li>
                        <li>Hamstring Curls</li>
                        <li>Leg Extension</li>
                        <li>Calf Raises</li>
                    </ol>
                    
                    <h3>Back Exercises</h3>
                    <ol>
                        <li>Lat Pulldowns</li>
                        <li>Close Grip Pulldown</li>
                        <li>Cable Rows</li>
                        <li>Pull-Ups</li>
                    </ol>
                </div>
                <div>
                                        <!-- Category C - Chest Exercises -->
                    <h3>Chest Exercises</h3>
                    <ol>
                    <li>Flat Dumbbell Press</li>
                    <li>Pec-Dec Flys</li>
                    <li>Decline Dumbbell Press</li>
                    <li>Pushups</li>
                    </ol>

                    <!-- Category D - Shoulder Exercises -->
                    <h3>Shoulder Exercises</h3>
                    <ol>
                    <li>Overhead Press Dumbbells</li>
                    <li>Lateral Raises</li>
                    <li>Rear Delt Flys</li>
                    <li>Shrugs</li>
                    </ol>
                </div>
                <div>
                    <!-- Category E - Triceps Exercises -->
                    <h3>Triceps Exercises</h3>
                    <ol>
                    <li>Close Grip Bench Press</li>
                    <li>Rope Pushdowns</li>
                    <li>Both Arm Cable Overhead Pull</li>
                    <li>Tricep Dips</li>
                    </ol>

                    <!-- Category F - Biceps Exercises -->
                    <h3>Biceps Exercises</h3>
                    <ol>
                    <li>Dumbbell Curls</li>
                    <li>Hammer Curls</li>
                    <li>Chin-Ups</li>
                    </ol>

                </div>
            </div>
            <div id="note">
                Note: Every workout session should be started with with warmup exercises
                        And post-workout stretch for optimal growth and recovery 
                <div>
                    <a target="new" class="clr-red" href="https://www.youtube.com/watch?v=utBERF6BPxQ"> Link for warmup</a>
                </div>
                <div>
                    <a target="new" class="clr-red"  href="https://www.youtube.com/watch?v=5DhoFwMjyT4"> Link for stretching</a>
                </div>
            </div>
        <?php } ?>  
            
        <?php 
            if ($bmi >= 18.5 && $bmi < 24.9) {
        ?>
                <div class="center-content"><h2></h2></div>
            
            <div class="days">
                <div>
                    <!-- Category A - Legs Exercises -->
                    <h3>Legs Exercises</h3>
                    <ol>
                    <li>Squats</li>
                    <li>Hamstring Curls</li>
                    <li>Leg Extension</li>
                    <li>Lunges</li>
                    <li>Calf Raises</li>
                    </ol>

                    <!-- Category B - Back Exercises -->
                    <h3>Back Exercises</h3>
                    <ol>
                    <li>Lat Pulldowns</li>
                    <li>Close Grip Pulldown</li>
                    <li>Cable Rows</li>
                    <li>One Arm Pull Down</li>
                    <li>Pull-Ups</li>
                    </ol>
                </div>
                <div> 
                              <!-- Category C - Chest Exercises -->
                    <h3>Chest Exercises</h3>
                    <ol>
                    <li>Flat Dumbbell Press</li>
                    <li>Pec-Dec Flys</li>
                    <li>Decline Dumbbell Press</li>
                    <li>Incline Bench Press</li>
                    <li>Pushups</li>
                    </ol>

                    <!-- Category D - Shoulder Exercises -->
                    <h3>Shoulder Exercises</h3>
                    <ol>
                    <li>Overhead Press Dumbbells</li>
                    <li>Lateral Raises</li>
                    <li>Rear Delt Flys</li>
                    <li>Face Pulls</li>
                    <li>Shrugs</li>
                    </ol>
                </div>
                <div> 
                    <!-- Category E - Triceps Exercises -->
                    <h3>Triceps Exercises</h3>
                    <ol>
                    <li>Close Grip Bench Press</li>
                    <li>Rope Pushdowns</li>
                    <li>Both Arm Cable Overhead Pull</li>
                    <li>Skull Crushers</li>
                    <li>Tricep Dips</li>
                    </ol>

                    <!-- Category F - Biceps Exercises -->
                    <h3>Biceps Exercises</h3>
                    <ol>
                    <li>Dumbbell Curls</li>
                    <li>Hammer Curl</li>
                    <li>Chin-Ups</li>
                    <li>Close Grip Curls</li>
                    </ol>

                </div>
            </div>
            <div id="note">
                Note: Every workout session should be started with with warmup exercises
                        And post-workout stretch for optimal growth and recovery 
                <div>
                    <a target="new" class="clr-red" href="https://www.youtube.com/watch?v=utBERF6BPxQ"> Link for warmup</a>
                </div>
                <div>
                    <a target="new" class="clr-red"  href="https://www.youtube.com/watch?v=5DhoFwMjyT4"> Link for stretching</a>
                </div>
            </div>
        <?php } ?>  

                <?php 
         if ($bmi >= 25 && $bmi < 29.9) {
        ?>
                 <div class="center-content"><h2></h2></div>
            
            <div class="days">
                <div>
                    <!-- Category A - Legs Exercises -->
                    <h3>Legs Exercises</h3>
                    <ol>
                    <li>Squats (Weighted)</li>
                    <li>Hamstring Curls</li>
                    <li>Leg Extension</li>
                    <li>Lunges</li>
                    <li>Calf Raises</li>
                    </ol>

                    <!-- Category B - Back Exercises -->
                    <h3>Back Exercises</h3>
                    <ol>
                    <li>Lat Pulldowns</li>
                    <li>Close Grip Pulldown</li>
                    <li>Cable Rows</li>
                    <li>One Arm Pull Down</li>
                    <li>Pull-Ups</li>
                    <li>Deadlift</li>
                    </ol>
                </div>
                <div>
                    <!-- Category C - Chest Exercises -->
                    <h3>Chest Exercises</h3>
                    <ol>
                    <li>Flat Dumbbell Press</li>
                    <li>Pec-Dec Flys</li>
                    <li>Decline Dumbbell Press</li>
                    <li>Incline Bench Press</li>
                    <li>Pushups</li>
                    <li>Barbell Bench Press</li>
                    </ol>

                    <!-- Category D - Shoulder Exercises -->
                    <h3>Shoulder Exercises</h3>
                    <ol>
                    <li>Overhead Press Dumbbells</li>
                    <li>Lateral Raises</li>
                    <li>Rear Delt Flys</li>
                    <li>Face Pulls</li>
                    <li>Shrugs</li>
                    <li>Barbell Overhead Press</li>
                    </ol>
                </div>
                <div>
                  
                    <!-- Category E - Triceps Exercises -->
                    <h3>Triceps Exercises</h3>
                    <ol>
                    <li>Close Grip Bench Press</li>
                    <li>Rope Pushdowns</li>
                    <li>Both Arm Cable Overhead Pull</li>
                    <li>Skull Crushers</li>
                    <li>Tricep Dips</li>
                    </ol>

                    <!-- Category F - Biceps Exercises -->
                    <h3>Biceps Exercises</h3>
                    <ol>
                    <li>Dumbbell Curls</li>
                    <li>Hammer Curl</li>
                    <li>Chin-Ups</li>
                    <li>Close Grip Curls</li>
                    <li>Barbell Curls</li>
                    </ol>

                                        <!-- Category G - Cardio -->
                    <h3>Cardio</h3>
                    <ol>
                        <li>10-minute session post-workout: Anything like cycling, skipping, or your preferred cardio activity.</li>
                    </ol>
                </div>
            </div>
                        <div id="note">
                Note: Every workout session should be started with with warmup exercises
                        And post-workout stretch for optimal growth and recovery 
                <div>
                    <a target="new" class="clr-red" href="https://www.youtube.com/watch?v=utBERF6BPxQ"> Link for warmup</a>
                </div>
                <div>
                    <a target="new" class="clr-red"  href="https://www.youtube.com/watch?v=5DhoFwMjyT4"> Link for stretching</a>
                </div>
            </div>
        <?php } ?> 

                <?php 
           if ($bmi >= 30) {
        ?>
              <div class="center-content"><h2></h2></div>
            
            <div class="days">
                <div>
                    <!-- Category A - Legs Exercises -->
                    <h3>Legs Exercises</h3>
                    <ol>
                    <li>Squats (Weighted)</li>
                    <li>Hamstring Curls</li>
                    <li>Leg Extension</li>
                    <li>Lunges</li>
                    <li>Calf Raises</li>
                    </ol>

                    <!-- Category B - Back Exercises -->
                    <h3>Back Exercises</h3>
                    <ol>
                    <li>Lat Pulldowns</li>
                    <li>Close Grip Pulldown</li>
                    <li>Cable Rows</li>
                    <li>One Arm Pull Down</li>
                    <li>Pull-Ups</li>
                    <li>Deadlift</li>
                    </ol>
                </div>
                <div>
                    <!-- Category C - Chest Exercises -->
                    <h3>Chest Exercises</h3>
                    <ol>
                    <li>Flat Dumbbell Press</li>
                    <li>Pec-Dec Flys</li>
                    <li>Decline Dumbbell Press</li>
                    <li>Incline Bench Press</li>
                    <li>Pushups</li>
                    <li>Barbell Bench Press</li>
                    </ol>

                    <!-- Category D - Shoulder Exercises -->
                    <h3>Shoulder Exercises</h3>
                    <ol>
                    <li>Overhead Press Dumbbells</li>
                    <li>Lateral Raises</li>
                    <li>Rear Delt Flys</li>
                    <li>Face Pulls</li>
                    <li>Shrugs</li>
                    <li>Barbell Overhead Press</li>
                    </ol>
                </div>
                <div>
                    <!-- Category E - Triceps Exercises -->
                    <h3>Triceps Exercises</h3>
                    <ol>
                    <li>Close Grip Bench Press</li>
                    <li>Rope Pushdowns</li>
                    <li>Both Arm Cable Overhead Pull</li>
                    <li>Skull Crushers</li>
                    <li>Tricep Dips</li>
                    </ol>

                    <!-- Category F - Biceps Exercises -->
                    <h3>Biceps Exercises</h3>
                    <ol>
                    <li>Dumbbell Curls</li>
                    <li>Hammer Curl</li>
                    <li>Chin-Ups</li>
                    <li>Close Grip Curls</li>
                    <li>Barbell Curls</li>
                    </ol>

                    <!-- Category G - Cardio -->
                    <h3>Cardio</h3>
                    <ol>
                        <li>15-20 minute session post-workout: Running, cycling, skipping, or your preferred cardio activity.</li>
                    </ol>
                </div>
            </div>
            <div id="note">
                Note: Every workout session should be started with with warmup exercises
                        And post-workout stretch for optimal growth and recovery 
                <div>
                    <a target="new" class="clr-red" href="https://www.youtube.com/watch?v=utBERF6BPxQ"> Link for warmup</a>
                </div>
                <div>
                    <a target="new" class="clr-red"  href="https://www.youtube.com/watch?v=5DhoFwMjyT4"> Link for stretching</a>
                </div>
            </div>
        <?php } ?> 

		</div>
	</section>

   
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
