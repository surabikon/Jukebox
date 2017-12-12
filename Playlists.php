<?php
require("methods.php");
$db_users = connectUsers();
$playlists = getPlaylistButtons($db_users, "test");

$db_users->close();

$top = <<<TOP
	<!DOCTYPE html>
	<html>
		<head>
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<link href='https://fonts.googleapis.com/css?family=Codystar' rel='stylesheet'>
			<link href='https://fonts.googleapis.com/css?family=Lobster Two' rel='stylesheet'>
			<link href='https://fonts.googleapis.com/css?family=Marvel' rel='stylesheet'>
		</head>
		<body>
			<section class="container topnav">
				<center>
					<a class="icon" style="position: fixed; left: 0;"><i class="fa fa-user-circle-o" style="color: black;">
						<section class="container topnavtext">
							Username
						</section>
					</i></a>
					<a class="icon" href="Login.html" style="position: fixed; right: 0;"><i class="fa fa-sign-out">
						<section class="container topnavtext">
							Logout
						</section>
					</i></a>
				</center>
			</section>

			<section class="container header">
				<h1>JUKEBOX</h1>
				<h2>Playlist</h2>
			</section>
TOP;

$bottom = <<<BOTTOM
			<section class="container list item-list">
				<ul>
					$playlists
				</ul>
			</section>

			<section class="container list item-list">
				<ul>
					<li>
						<a class="item" href="Edit Playlist.php">Liked Songs<i class="fa fa-angle-right"></i></a>
					</li>
				</ul>
			</section>

			<section class="container nav">
				<center>
					<a class="icon" href="Home.html"><i class="fa fa-home" ></i></a>
					<a class="icon" href="Playlists.php"><i class="fa fa-list" style="color: #FFFFFF;"></i></a>
					<a class="icon" href="Currently Playing.php"><i class="fa fa-play"></i></a>
				</center>
			</section>
		</body>
BOTTOM;

// echo genPage("Playlists", $top.$playlists.$bottom);
echo genPage("Playlists", $top.$bottom);
?>
