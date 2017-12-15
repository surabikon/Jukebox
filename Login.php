<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Codystar' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Lobster Two' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Marvel' rel='stylesheet'>

		<script>
			function forgotPassword(){
                var email = prompt("Enter email to retrieve password:", "");
                if (email != "" && email != null) {
                	window.alert("Password sent to " + email + ".");
                } else {
                	window.alert("Please enter a valid email.")
                }
            }
		</script>
	</head>

	<body>
		<section class="container header">
			<h1>JUKEBOX</h1>
			<h2>Login</h2>
		</section>

		<section class="container list form-list">
			<ul>
				<form>
				<li>
					<label>Username:</label>
					<input type="text" placeholder="Enter Username">
				</li>
				</form>
				<form action="/Jukebox/Home.php">
				<li>
					<label>Password:</label>
					<input type="password" placeholder="Enter Password">
				</li>
				</form>
			</ul>
		</section>

		<section class="container list item-list">
			<ul>
				<li>
					<a class="item" onclick=forgotPassword()>Forgot Password<i class="fa fa-angle-right"></i></a>
				</li>
				<li>
					<a class="item" href="Home.php">Login<i class="fa fa-angle-right"></i></a>
				</li>
			</ul>
		</section>
	</body>
</html>
