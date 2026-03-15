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
                       <h2>Diet Plan (Underweight Category)</h2>
                    <?php } ?> 
                                        <?php 
                        if ($bmi >= 18.5 && $bmi < 24.9) {
                    ?>
                          <h2>Diet Plan (Healthy weight Category)</h2>
                    <?php } ?>  
                    <?php 
                      if ($bmi >= 25 && $bmi < 29.9) {
                    ?>
                          <h2>Diet Plan (At a risk of Overweight Category)</h2>
                    <?php } ?>  
                    <?php 
                        if ($bmi >= 30) {
                    ?>
                        <h2>Diet Plan (Overweight Category)</h2> 
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
                <div class="max-diet-text">                     
                    <h3>Day 1:</h3>
                    <ul>
                        <li>Breakfast: Banana or mango milkshake with a handful of nuts</li>
                        <li>Mid-morning Snack: Vegetable or chicken soup with a whole wheat bread roll</li>
                        <li>Lunch: Rice with lentils (dal) and a generous serving of mixed vegetables</li>
                        <li>Evening Snack: Fruit yogurt or a fruit smoothie</li>
                        <li>Dinner: Roti with a paneer (cottage cheese) curry and a side of salad</li>
                    </ul>

                    <h3>Day 2:</h3>
                    <ul>
                        <li>Breakfast: Oatmeal cooked in milk with dried fruits and nuts</li>
                        <li>Mid-morning Snack: A fruit salad with a dollop of fresh cream</li>
                        <li>Lunch: Chicken biryani with raita (yogurt with cucumber and spices)</li>
                        <li>Evening Snack: A handful of peanuts or cashew nuts</li>
                        <li>Dinner: Paratha (Indian flatbread) with a potato and pea curry</li>
                    </ul>
                </div>  
                <div class="max-diet-text">  
                    <h3>Day 3:</h3>
                    <ul>
                        <li>Breakfast: Whole wheat bread with scrambled eggs and a glass of milk</li>
                        <li>Mid-morning Snack: Vegetable or chicken clear soup with a whole wheat bread roll</li>
                        <li>Lunch: Rice with rajma (kidney beans) and a side of cucumber-tomato salad</li>
                        <li>Evening Snack: A fruit of your choice with a slice of cheese</li>
                        <li>Dinner: Vegetable pulao with a side of yogurt</li>
                    </ul>

                    <h3>Day 4:</h3>
                    <ul>
                        <li>Breakfast: Besan (gram flour) chilla (pancake) with mint chutney</li>
                        <li>Mid-morning Snack: A bowl of fruit custard</li>
                        <li>Lunch: Roti with a chicken curry and a side of mixed vegetable salad</li>
                        <li>Evening Snack: A handful of almonds or walnuts</li>
                        <li>Dinner: Vegetable khichdi (a mix of rice, lentils, and vegetables) with a dollop of ghee</li>
                    </ul>
                </div>  
                <div class="max-diet-text">  
                    <h3>Day 5:</h3>
                    <ul>
                        <li>Breakfast: Semolina (suji) upma with mixed vegetables</li>
                        <li>Mid-morning Snack: A fruit smoothie with yogurt and honey</li>
                        <li>Lunch: Rice with fish curry and a side of mixed vegetable salad</li>
                        <li>Evening Snack: A bowl of roasted chickpeas (chana)</li>
                        <li>Dinner: Paratha with a mushroom curry and raita</li>
                    </ul>

                    <h3>Day 6:</h3>
                    <ul>
                        <li>Breakfast: Vegetable poha (flattened rice) with a glass of buttermilk</li>
                        <li>Mid-morning Snack: A fruit salad with a scoop of ice cream</li>
                        <li>Lunch: Roti with a mutton curry and a side of cucumber-onion salad</li>
                        <li>Evening Snack: A handful of dried fruits</li>
                        <li>Dinner: Vegetable biryani with raita</li>
                    </ul>
                    <h3>Day 7:</h3>
                    <ul>
                        <li>Breakfast: Whole wheat bread with peanut butter and a glass of milk</li>
                        <li>Mid-morning Snack: Vegetable or chicken clear soup with a whole wheat bread roll</li>
                        <li>Lunch: Rice with dal makhani and a side of mixed vegetable salad</li>
                        <li>Evening Snack: A fruit of your choice with a slice of cheese</li>
                        <li>Dinner: Paneer (cottage cheese) paratha with a side of yogurt</li>
                    </ul>

                    <ul>Ensure you drink plenty of water throughout the day.</ul>
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
                <div class="max-diet-text">                     
                    <h3>Day 1:</h3>
                    <ul>
                        <li>Breakfast: Vegetable poha (flattened rice) with a side of yogurt</li>
                        <li>Mid-morning Snack: A fruit of your choice</li>
                        <li>Lunch: Whole wheat roti with a dal (lentil) preparation and mixed vegetable curry</li>
                        <li>Evening Snack: Roasted chickpeas (chana) or a handful of nuts</li>
                        <li>Dinner: Grilled fish or paneer (cottage cheese) with quinoa and a fresh salad</li>
                    </ul>

                    <h3>Day 2:</h3>
                    <ul>
                        <li>Breakfast: Oatmeal cooked with milk and topped with fresh fruits and nuts</li>
                        <li>Mid-morning Snack: A glass of buttermilk or a fruit smoothie</li>
                        <li>Lunch: Brown rice with a chicken curry and mixed vegetable salad</li>
                        <li>Evening Snack: Sprouts salad or a fruit of your choice</li>
                        <li>Dinner: Whole wheat pasta with a tomato-based vegetable sauce</li>
                    </ul>
                </div>
                <div class="max-diet-text"> 
                    <h3>Day 3:</h3>
                    <ul>
                        <li>Breakfast: Vegetable upma (semolina cooked with vegetables) with coconut chutney</li>
                        <li>Mid-morning Snack: A handful of mixed berries or a fruit salad</li>
                        <li>Lunch: Roti with palak paneer (spinach with cottage cheese) and a cucumber-tomato salad</li>
                        <li>Evening Snack: Yogurt with a sprinkling of nuts</li>
                        <li>Dinner: Lentil soup with a side of multigrain bread</li>
                    </ul>

                    <h3>Day 4:</h3>
                    <ul>
                        <li>Breakfast: Moong dal chilla (pancake) with mint chutney</li>
                        <li>Mid-morning Snack: A bowl of papaya or a fruit of your choice</li>
                        <li>Lunch: Quinoa salad with grilled vegetables and a portion of lean protein (chicken or tofu)</li>
                        <li>Evening Snack: A handful of almonds or walnuts</li>
                        <li>Dinner: Brown rice with a mixed vegetable curry and a side of yogurt</li>
                    </ul>
                </div>
                <div class="max-diet-text"> 
                    <h3>Day 5:</h3>
                    <ul>
                        <li>Breakfast: Whole wheat bread with avocado and poached eggs</li>
                        <li>Mid-morning Snack: A bowl of fruit yogurt</li>
                        <li>Lunch: Roti with bhindi masala (okra stir-fry) and a side of salad</li>
                        <li>Evening Snack: Roasted makhana (fox nuts) or a fruit of your choice</li>
                        <li>Dinner: Vegetable biryani with raita (yogurt with cucumber and spices)</li>
                    </ul>

                    <h3>Day 6:</h3>
                    <ul>
                        <li>Breakfast: Vegetable dalia (broken wheat porridge) with a glass of milk</li>
                        <li>Mid-morning Snack: A fruit of your choice or a handful of grapes</li>
                        <li>Lunch: Whole wheat roti with a chicken or paneer curry and a side of mixed vegetables</li>
                        <li>Evening Snack: A bowl of mixed fruits</li>
                        <li>Dinner: Brown rice with a mushroom curry and a fresh salad</li>
                    </ul>

                    <h3>Day 7:</h3>
                    <ul>
                        <li>Breakfast: Ragi (finger millet) dosa with sambar (spicy lentil soup)</li>
                        <li>Mid-morning Snack: A fruit of your choice or a small bowl of mixed berries</li>
                        <li>Lunch: Quinoa pulao with a side of yogurt and cucumber-onion salad</li>
                        <li>Evening Snack: A handful of roasted peanuts or chana</li>
                        <li>Dinner: Whole wheat bread with vegetable soup</li>
                    </ul>

                    <ul>Ensure you drink plenty of water throughout the day.</ul>
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
                <div class="max-diet-text">                                         
                    <h3>Day 1:</h3>
                    <ul>
                        <li>Breakfast: Vegetable dalia (broken wheat porridge) with a glass of skimmed milk</li>
                        <li>Mid-morning Snack: A bowl of mixed fruits or a small portion of nuts</li>
                        <li>Lunch: Roti with a moderate portion of dal (lentils) and a side of mixed vegetables</li>
                        <li>Evening Snack: Sprout salad or a small bowl of yogurt</li>
                        <li>Dinner: Grilled fish or chicken with quinoa and a fresh cucumber-tomato salad</li>
                    </ul>

                    <h3>Day 2:</h3>
                    <ul>
                        <li>Breakfast: Oatmeal cooked with water, topped with fresh fruits and nuts</li>
                        <li>Mid-morning Snack: A fruit smoothie with yogurt and honey</li>
                        <li>Lunch: Brown rice with a small portion of chicken curry and mixed vegetable salad</li>
                        <li>Evening Snack: Roasted chana (chickpeas) or a small portion of roasted peanuts</li>
                        <li>Dinner: Whole wheat pasta with a light tomato-based vegetable sauce</li>
                    </ul>
                </div>
                <div class="max-diet-text"> 
                    <h3>Day 3:</h3>
                    <ul>
                        <li>Breakfast: Ragi (finger millet) dosa with sambar (spicy lentil soup) and coconut chutney</li>
                        <li>Mid-morning Snack: A bowl of papaya or a fruit of your choice</li>
                        <li>Lunch: Roti with a small portion of paneer (cottage cheese) and a side of cucumber-onion salad</li>
                        <li>Evening Snack: A small bowl of fruit yogurt</li>
                        <li>Dinner: Lentil soup with a side of quinoa or a small portion of brown rice</li>
                    </ul>

                    <h3>Day 4:</h3>
                    <ul>
                        <li>Breakfast: Whole wheat bread with a boiled egg and a glass of buttermilk</li>
                        <li>Mid-morning Snack: A handful of mixed berries or a fruit salad</li>
                        <li>Lunch: Vegetable quinoa salad with a portion of grilled fish or tofu</li>
                        <li>Evening Snack: A small portion of almonds or walnuts</li>
                        <li>Dinner: Brown rice with a mixed vegetable curry and a small portion of yogurt</li>
                    </ul>
                </div>
                <div class="max-diet-text"> 
                    <h3>Day 5:</h3>
                    <ul>
                        <li>Breakfast: Vegetable upma (semolina cooked with vegetables) with coconut chutney</li>
                        <li>Mid-morning Snack: A bowl of fruit salad or a small bowl of mixed berries</li>
                        <li>Lunch: Roti with a small portion of chicken curry and a side of mixed vegetable salad</li>
                        <li>Evening Snack: A small portion of roasted makhana (fox nuts) or a fruit of your choice</li>
                        <li>Dinner: Whole wheat bread with a vegetable soup and a side of salad</li>
                    </ul>

                    <h3>Day 6:</h3>
                    <ul>
                        <li>Breakfast: Moong dal chilla (pancake) with mint chutney and a glass of skimmed milk</li>
                        <li>Mid-morning Snack: A small bowl of fruit yogurt or a fruit smoothie</li>
                        <li>Lunch: Brown rice with a small portion of fish curry and a side of mixed vegetables</li>
                        <li>Evening Snack: A small portion of roasted chana or peanuts</li>
                        <li>Dinner: Quinoa pulao with a side of yogurt and cucumber-tomato salad</li>
                    </ul>

                    <h3>Day 7:</h3>
                    <ul>
                        <li>Breakfast: Vegetable poha (flattened rice) with a glass of buttermilk</li>
                        <li>Mid-morning Snack: A fruit of your choice or a small portion of nuts</li>
                        <li>Lunch: Roti with a moderate portion of dal and a side of mixed vegetables</li>
                        <li>Evening Snack: Sprout salad or a small bowl of yogurt</li>
                        <li>Dinner: Grilled chicken or paneer with quinoa and a fresh cucumber-tomato salad
                    </ul>
                    <ul>
                        Ensure you drink plenty of water throughout the day and consider incorporating regular physical activity into your routine                </div>  
                    </ul>
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
                <div class="max-diet-text">                                         
                    <h3>Day 1:</h3>
                    <ul>
                        <li>Breakfast: Two idlis (steamed rice cakes) with sambar (spicy lentil soup) and coconut chutney</li>
                        <li>Mid-morning Snack: A bowl of mixed fruits or a small portion of nuts</li>
                        <li>Lunch: A small portion of brown rice with a moderate portion of dal (lentils) and a side of mixed vegetables</li>
                        <li>Evening Snack: Sprout salad or a small bowl of yogurt</li>
                        <li>Dinner: Grilled fish or chicken with a quinoa salad and a fresh cucumber-tomato salad</li>
                    </ul>

                    <h3>Day 2:</h3>
                    <ul>
                        <li>Breakfast: Oatmeal cooked with water, topped with fresh fruits and a few almonds</li>
                        <li>Mid-morning Snack: A fruit smoothie with yogurt and honey</li>
                        <li>Lunch: Brown rice with a small portion of chicken curry and mixed vegetable salad</li>
                        <li>Evening Snack: Roasted chana (chickpeas) or a small portion of roasted peanuts</li>
                        <li>Dinner: Whole wheat pasta with a light tomato-based vegetable sauce</li>
                    </ul>
                </div>
                <div class="max-diet-text">
                    <h3>Day 3:</h3>
                    <ul>
                        <li>Breakfast: Ragi (finger millet) dosa with sambar and coconut chutney</li>
                        <li>Mid-morning Snack: A bowl of papaya or a small portion of nuts</li>
                        <li>Lunch: Roti with a small portion of paneer (cottage cheese) and a side of cucumber-onion salad</li>
                        <li>Evening Snack: A small bowl of fruit yogurt</li>
                        <li>Dinner: Lentil soup with a side of quinoa or a small portion of brown rice</li>
                    </ul>

                    <h3>Day 4:</h3>
                    <ul>
                        <li>Breakfast: Whole wheat bread with a boiled egg and a glass of buttermilk</li>
                        <li>Mid-morning Snack: A handful of mixed berries or a fruit salad</li>
                        <li>Lunch: Vegetable quinoa salad with a small portion of grilled fish or tofu</li>
                        <li>Evening Snack: A small portion of almonds or walnuts</li>
                        <li>Dinner: Brown rice with a mixed vegetable curry and a small portion of yogurt</li>
                    </ul>
                </div>
                <div class="max-diet-text">
                    <h3>Day 5:</h3>
                    <ul>
                        <li>Breakfast: Vegetable upma (semolina cooked with vegetables) with coconut chutney</li>
                        <li>Mid-morning Snack: A bowl of fruit salad or a small bowl of mixed berries</li>
                        <li>Lunch: Roti with a small portion of chicken curry and a side of mixed vegetable salad</li>
                        <li>Evening Snack: A small portion of roasted makhana (fox nuts) or a fruit of your choice</li>
                        <li>Dinner: Whole wheat bread with a vegetable soup and a side of salad</li>
                    </ul>

                    <h3>Day 6:</h3>
                    <ul>
                        <li>Breakfast: Moong dal chilla (pancake) with mint chutney and a glass of buttermilk</li>
                        <li>Mid-morning Snack: A small bowl of fruit yogurt or a fruit smoothie</li>
                        <li>Lunch: Brown rice with a small portion of fish curry and a side of mixed vegetables</li>
                        <li>Evening Snack: A small portion of roasted chana or peanuts</li>
                        <li>Dinner: Quinoa pulao with a side of yogurt and cucumber-tomato salad</li>
                    </ul>

                    <h3>Day 7:</h3>
                    <ul>
                        <li>Breakfast: Vegetable poha (flattened rice) with a glass of buttermilk</li>
                        <li>Mid-morning Snack: A fruit of your choice or a small portion of nuts</li>
                        <li>Lunch: Roti with a moderate portion of dal and a side of mixed vegetables</li>
                        <li>Evening Snack: Sprout salad or a small bowl of yogurt</li>
                        <li>Dinner: Grilled chicken or paneer with quinoa and a fresh cucumber-tomato salad</li>
                    </ul>
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
