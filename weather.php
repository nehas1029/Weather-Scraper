<?php
	$message ="";
	
	
	if($_GET["userInput"]) {
		
		$_GET["userInput"] = str_replace(' ','',$_GET["userInput"]); // remove any spaces
		$url = 'http://www.weather-forecast.com/locations/'.$_GET["userInput"].'/forecasts/latest';
		$regex = '#<p class="summary">(.*?)</p>#'; /* extract weather data from target website, realistically this would be inpractical 
		in a real website, because if the target website's source code changed then this would extract the wrong information but this 
		method was used for example purposes*/
		$page = file_get_contents($url); 
		if($page) {
			
			 preg_match($regex, $page, $matches); // match data
			 $message.='<div class="alert alert-info style=color:black;">.'.$matches[0].'</div>'; 
		 
		 } else{
		 	
		 	$message.='<div class="alert alert-danger style=color:red;">This request has failed please make sure you\'ve entered a valid city name or try again later.</div>';
		 }
	
	 }
		
 ?>

 <!DOCTYPE html>
 <html>

 
			
 <head>
 	<title>Email contact form</title>
<script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.js"></script>

 	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
	body 	{ 						
              
                background: url(backgroundimage.jpg) no-repeat center center fixed; /*provide a centered full-width background for homepage*/
	       -webkit-background-size: cover;
	       -moz-background-size: cover;
	       -o-background-size: cover;
	        background-size: cover;
	}
	
	h1 {
		margin-top:150px;
		font-size: 3.5em; 
		color: white;
	}
	
	p {
		margin-bottom: 15px;
		color: black;
	}
	
	#text-box {
		
		width: 500px;
		margin: auto;
	}
	
	#submitBtn {
		
		margin-top: 15px;
	}
	
	#message {
		
		width:500px;
		margin: auto;
	}
	
	#submitBtn {
		
		margin-bottom: 15px;
	}
</style>


 </head>
 <body>

	<div class="container text-center">
		<div class="row">
			<div class="col-xs-12">
				<h1>What's the Weather?</h1>
				
				<p>Enter the name of a city</p>
				
				<form method="get">
					<div class="form-group">
						<input type="text" class="form-control" name="userInput" id="text-box" placeholder="Eg. London, Tokyo">
					</div>
					<button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
				</form>
					<div class="text-center" id="message"><?php echo $message; ?></div> <!--use PHP variable to render message-->
			</div>
		</div>
	</div>
</div>
 
 </body>
 </html>


