<!DOCTYPE html>
<html lang="en">
<head>
	<title>Booking Form</title>
	<link rel="stylesheet" type="text/css" href="form_style.css"/>
	<meta charset="utf-8">
	<meta name="description" content="FoodEdge Booking Form">
	<meta name="keywords" content="Web, programming">
	<meta name="author" content="AWG MUHAMMAD IZZAT BIN AWANG SAFRI">
	<script type="text/javascript" src="validator.js"></script>
</head>
<body class="bookingformbody">
	<div class="bookingform">
	<button onclick="window.location='index.php';" class="button2"><span>Back</span></button>
	<form name="bookingform" action="confirmationpage.php" method="post" onsubmit="return checkForm()">
		<h1>Booking</h1>
		<p class = "Names"> Hello <?php echo $namez = "Simon"?>,</p>
		<select name="occasion" id="occasion">
			<option value="" selected disabled hidden><option value="" selected disabled hidden>Please select your occasion</option>
			<option value="Celebration">Celebration</option>
			<option value="Corporate">Corporate</option>
			<option value="Social">Social</option>
			<option value="Holiday">Holiday</option>
		</select>
		<input type="time" id="time" name="time">
		<input type="date" id="eventdate" name="eventdate" placeholder="Date">
		<div id="radiobuttondiv">
			<label for="package" class="title">Package: </label>
			<div id="radiogroup">
				<label for="package1" class="package">Exquisite
				<input type="radio" id="package1" name="package" value="Exquisite">
				<span class="checkmark"></span>
				</label>
			
				<label for="package2" class="package">Heavenly
				<input type="radio" id="package2" name="package" value="Heavenly">
				<span class="checkmark"></span>
				</label>
			
				<label for="package3" class="package">Healthy
				<input type="radio" id="package3" name="package" value="Healthy">
				<span class="checkmark"></span>
				</label>
			
			
				<label for="package4" class="package">Zealous
				<input type="radio" id="package4" name="package" value="Zealous">
				<span class="checkmark"></span>
				</label>
				
				<label for="package5" class="package">Flourishing
				<input type="radio" id="package5" name="package" value="Flourishing">
				<span class="checkmark"></span>
				</label>
			</div>
		</div>
		<textarea name="address" id="address" maxlength="250" rows="6" placeholder="Address"></textarea>
		<div class ="buttongroup">
			<input type="reset" class="button2"></button>
			<button class="buttonsubmit"><span>Submit</span></button>
		</div>	
	</form>
	</div>
</body>
</html>