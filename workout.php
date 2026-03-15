<?php 
session_start();
error_reporting(0);
include 'include/config.php';
$uid=$_SESSION['uid'];
if(isset($_POST['submit']))
{ 
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $height=$_POST['heightcm'];
    $weight=$_POST['weight'];
    $activity=$_POST['activity'];
$sql="UPDATE tbluser SET gender = '$gender' , age = $age , height = $height , weight = $weight ,activityPoint = $activity where id = $uid";

$query = $dbh -> prepare($sql);
$query -> execute();
echo "<script>alert('saved successfully ........');</script>";
header("location: dashboard.php");
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
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
					<h2>Enter Your Details</h2>
				</div>
			</div>
		</div>
	</section>



	<!-- Pricing Section -->
	<section class="pricing-section">
		<div class="container">

			<div class="row">

				<div class="col-lg-12 col-sm-6">
                    <form id="que-form"  method="POST" class="form  wrapper question-form">
                         <img src="img/img2.png" class="que-img"> 
               <div class="page-break-1">
                    <div class="form_field">
                        <p>Are you male or female?</p>
                        <div class="element">
                            <input id="male" name="gender" required="" type="radio" value="male" class="not-empty radio-btn">
                            <label for="male">Male</label>
                            <input id="female" name="gender" required="" type="radio" value="female" class="not-empty radio-btn">
                            <label for="female">Female</label>
                        </div>
                    </div>
                    <div class="form_field">
                        <p>What is your age?</p>
                        <div class="element">
                            <select id="age" name="age" required  class="transparentblock">
                                <option style="font-family: Poppins, sans-serif;" value="">Age</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                                <option value="48">48</option>
                                <option value="49">49</option>
                                <option value="50">50</option>
                                <option value="51">51</option>
                                <option value="52">52</option>
                                <option value="53">53</option>
                                <option value="54">54</option>
                                <option value="55">55</option>
                                <option value="56">56</option>
                                <option value="57">57</option>
                                <option value="58">58</option>
                                <option value="59">59</option>
                                <option value="60">60</option>
                                <option value="61">61</option>
                                <option value="62">62</option>
                                <option value="63">63</option>
                                <option value="64">64</option>
                                <option value="65">65</option>
                                <option value="66">66</option>
                                <option value="67">67</option>
                                <option value="68">68</option>
                                <option value="69">69</option>
                                <option value="70">70</option>
                                <option value="71">71</option>
                                <option value="72">72</option>
                                <option value="73">73</option>
                                <option value="74">74</option>
                                <option value="75">75</option>
                                <option value="76">76</option>
                                <option value="77">77</option>
                                <option value="78">78</option>
                                <option value="79">79</option>
                                <option value="80">80</option>
                                <option value="81">81</option>
                                <option value="82">82</option>
                                <option value="83">83</option>
                                <option value="84">84</option>
                                <option value="85">85</option>
                                <option value="86">86</option>
                                <option value="87">87</option>
                                <option value="88">88</option>
                                <option value="89">89</option>
                                <option value="90">90</option>
                                <option value="91">91</option>
                                <option value="92">92</option>
                                <option value="93">93</option>
                                <option value="94">94</option>
                                <option value="95">95</option>
                                <option value="96">96</option>
                                <option value="97">97</option>
                                <option value="98">98</option>
                                <option value="99">99</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    <div class="form_field c_height">
                        <p>What is your height?</p>
                        <div class="element" style="display: inline-flex;">
                            <div  class="height" maxlength="4">                                
                                <!-- <input id="heightcm" name="heightcm" type="text" class="transparentblock heightcm"  required>
                                <span class="weight-unit">cm</span> -->
                                <div class="height" maxlength="4">
                                    <select id="height" name="height" class="transparentblock" onChange=" updateHeight('feet')">
                                        <option value="">Select</option>
                                        <option value="4'0" "="">4'0</option>
                                        <option value="4'1" "="">4'1</option>
                                        <option value="4'2" "="">4'2</option>
                                        <option value="4'3" "="">4'3</option>
                                        <option value="4'4" "="">4'4</option>
                                        <option value="4'5" "="">4'5</option>
                                        <option value="4'6" "="">4'6</option>
                                        <option value="4'7" "="">4'7</option>
                                        <option value="4'8" "="">4'8</option>
                                        <option value="4'9" "="">4'9</option>
                                        <option value="4'10" "="">4'10</option>
                                        <option value="4'11" "="">4'11</option>
                                        <option value="5'0" "="">5'0</option>
                                        <option value="5'1" "="">5'1</option>
                                        <option value="5'2" "="">5'2</option>
                                        <option value="5'3" "="">5'3</option>
                                        <option value="5'4" "="">5'4</option>
                                        <option value="5'5" "="">5'5</option>
                                        <option value="5'6" "="">5'6</option>
                                        <option value="5'7" "="">5'7</option>
                                        <option value="5'8" "="">5'8</option>
                                        <option value="5'9" "="">5'9</option>
                                        <option value="5'10" "="">5'10</option>
                                        <option value="5'11" "="">5'11</option>
                                        <option value="6'0" "="">6'0</option>
                                        <option value="6'1" "="">6'1</option>
                                        <option value="6'2" "="">6'2</option>
                                        <option value="6'3" "="">6'3</option>
                                        <option value="6'4" "="">6'4</option>
                                        <option value="6'5" "="">6'5</option>
                                        <option value="6'6" "="">6'6</option>
                                        <option value="6'7" "="">6'7</option>
                                        <option value="6'8" "="">6'8</option>
                                        <option value="6'9" "="">6'9</option>
                                        <option value="6'10" "="">6'10</option>
                                        <option value="6'11" "="">6'11</option>
                                        <option value="7'0" "="">7'0</option>
                                        <option value="7'1" "="">7'1</option>
                                        <option value="7'2" "="">7'2</option>
                                        <option value="7'3" "="">7'3</option>
                                        <option value="7'4" "="">7'4</option>
                                        <option value="7'5" "="">7'5</option>
                                        <option value="7'6" "="">7'6</option>
                                        <option value="7'7" "="">7'7</option>
                                        <option value="7'8" "="">7'8</option>
                                        <option value="7'9" "="">7'9</option>
                                        <option value="7'10" "="">7'10</option>
                                        <option value="7'11" "="">7'11</option>
                                        <option value="8'0" "="">8'0</option>
                                    </select>
                                    <span class="weight-unit">Feet</span>
                                    <span class="or-word">OR</span>
                                    <input id="heightcm" name="heightcm" type="text" class="transparentblock heightcm" required>
                                    <span class="weight-unit">cm</span>
                                </div>
                            </div>                            
                        </div>
                    </div>                   
                    <div class="form_field c_height">
                        <p>What is your current weight? (Kg)</p>
                        <div class="element">
                            <p><input id="weight" name="weight" required="" type="text" class="transparentblock" required></p>
                         </div>
                    </div>
                    <div class="form_field c_height">
                        <p>  Select Your Activity !!!</p>
                        <div class="element">
                            <select id="activity" name="activity" required  class="transparentblock">
                                <option style="font-family: Poppins, sans-serif;" value="">Activities </option>
                                <option value="1.2"> Sedentary </option>
                                <option value="1.375"> Lightly Active </option>
                                <option value="1.47"> Moderate </option>
                                <option value="1.55"> Active </option>
                                <option value="1.725">Very active</option>                                                              
                            </select>
                         </div>
                    </div>
                     <div class="form_field">
                         <input type="submit" id="diet" class="btn calc-btn" value="submit" name="submit">
                         <input type="button" class="btn calc-btn" value="Calculate BMI" onClick="calculate()">
                        <div id="dsp-bmi"></div>
                    </div>                   
                </div>    
            </form> 
				</div>
			</div>
		</div>
	</section>

    <script>
        async function calculate(event) {
            let age = document.getElementById("age").value;
            let weight = parseInt(document.getElementById("weight").value);
            let heightcm = document.getElementById("heightcm").value;
            let heightInMeter = await centimetersToMeters(heightcm)
            
            let BMI = await calculateBMI(weight, heightInMeter);
            console.log('oooooooooooooo', BMI, weight, heightInMeter);

            if (BMI < 18.5) {
                document.getElementById("dsp-bmi").innerHTML = `Your BMI is ${BMI.toFixed(2)} (Underweight)`;
                document.getElementById("btndiv").style="display:block";
                // document.getElementById("bmi-category").value = 1;
                document.getElementById("que-form").action = '?controller=user&action=workout&catagory=1';
                
            } else if (BMI >= 18.5 && BMI < 24.9) {
                document.getElementById("dsp-bmi").innerHTML = `Your BMI is ${BMI.toFixed(2)} (Healthy weight)`;
                document.getElementById("btndiv").style="display:block";
                // document.getElementById("bmi-category").value = 2;
                document.getElementById("que-form").action = '?controller=user&action=workout&catagory=2';
            } else if (BMI >= 25 && BMI < 29.9) {
                document.getElementById("dsp-bmi").innerHTML = `Your BMI is ${BMI.toFixed(2)} (at risk of Overweight)`;
                document.getElementById("btndiv").style="display:block";
                // document.getElementById("bmi-category").value = 3;
                document.getElementById("que-form").action = '?controller=user&action=workout&catagory=3';
            } else if (BMI >= 30) {
                document.getElementById("dsp-bmi").innerHTML = `Your BMI is ${BMI.toFixed(2)} (Overweight)`;
                document.getElementById("btndiv").style="display:block";
                // document.getElementById("bmi-category").value = 4;
                document.getElementById("que-form").action = '?controller=user&action=workout&catagory=4';
            }
        }

        function calculateBMI(weight, height) {
        // Calculate BMI
            console.log('hhhhhhhhhhh', weight, height);
            const bmi = weight / (height * height);
            return bmi;
        }

              
        function centimetersToMeters(centimeters) {
            const meters = centimeters / 100;
            return meters;
        }

            // Get the heightcm input element
            var heightCmInput = document.getElementById('heightcm');

            // Add an event listener for the 'input' event
            heightCmInput.addEventListener('input', function() {
                updateHeight('cm');
            });


    </script>

 <script>
    // Function to convert feet and inches to centimeters
    function feetToCm(feet, inches) {
        var totalInches = feet * 12 + inches;
        var cm = totalInches * 2.54;
        return cm;
    }

    // Function to convert centimeters to feet and inches
    function cmToFeet(cm) {
        var inches = cm / 2.54;
        var feet = Math.floor(inches / 12);
        var remainingInches = Math.round(inches % 12);
        return [feet, remainingInches];
    }

    // Function to update the other input based on the selected input
    function updateHeight(inputType) {
        if (inputType === 'feet') {
            var heightString = document.getElementById('height').value;
            var feetAndInches = heightString.split("'");
            var feet = parseInt(feetAndInches[0]);
            var inches = parseInt(feetAndInches[1]);
            var cm = feetToCm(feet, inches);
            document.getElementById('heightcm').value = cm;
        } else if (inputType === 'cm') {
            var cm = document.getElementById('heightcm').value;
            var [feet, inches] = cmToFeet(cm);
            // Update the dropdown select
            updateSelect(feet, inches);
        }
    }

    // Function to update the dropdown select
    function updateSelect(feet, inches) {
                    console.log('vvvvvvvv', `${feet}'${inches}`)
        var select = document.getElementById('height');
        for (var i = 0; i < select.options.length; i++) {
            if (select.options[i].value == `${feet}'${inches}`) {
                select.selectedIndex = i;
                break;
            }
        }
    }

    // // Event listener to update when feet dropdown changes
    // document.getElementById('height').addEventListener('change', function() {
    //     updateHeight('feet');
    // });

    // // Event listener to update when cm input changes
    // document.getElementById('heightcm').addEventListener('input', function() {
    //     updateHeight('cm');
    // });
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
