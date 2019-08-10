<?php

session_start();
if (!isset($_SESSION['username'])) {
	$username = "Test Username";
} else {
	$username = $_SESSION['username'];
}

$body = <<<BODY
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Codystar' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Lobster Two' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Marvel' rel='stylesheet'>
	</head>

	<body>
		<section class="container topnav">
			<center>
				<a class="icon" style="position: fixed; left: 0;"><i class="fa fa-user-circle-o" style="color: black;">
					<section class="container topnavtext">
						$username
					</section>
				</i></a>
				<a class="icon" href="Login.php" style="position: fixed; right: 0;"><i class="fa fa-sign-out">
					<section class="container topnavtext">
						Logout
					</section>
				</i></a>
			</center>
		</section>

		<section class="container header">
			<h1>JUKEBOX</h1>
			<h2>Start a Room</h2>
		</section>

		<section class="container list form-list">
			<ul>
				<form>
				<li>
					<label>Room Code:</label>
					<input type="text" placeholder="Enter Room Code">
				</li>
				</form>
				<form>
				<li>
					<label>% to Skip:</label>
					<input type="text" placeholder="50">
				</li>
				</form>
			</ul>
		</section>

		<section class="container list item-list">
			<ul>
				<li>
					<a class="item" href="Currently Playing.php?playlistName=Empty Party">Start a Room From Scratch<i class="fa fa-angle-right"></i></a>
				</li>
				<li>
					<a class="item" href="Playlists.php">From Existing Playlist<i class="fa fa-angle-right"></i></a>
				</li>
			</ul>
		</section>

		<section class="container nav">
			<center>
				<a class="icon" href="Home.php"><i class="fa fa-home"></i></a>
				<a class="icon" href="Manage Playlists.php"><i class="fa fa-list"></i></a>
				<a class="icon" href="Currently Playing.php"><i class="fa fa-play"></i></a>
			</center>
		</section>
	</body>
</html>

BODY;

echo $body;
 ?>
