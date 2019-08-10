<?php
require("methods.php");

session_start();
if (!isset($_SESSION['username'])) {
	$username = "Test Username";
} else {
	$username = $_SESSION['username'];
}

$db_playlists = connectPlaylists();
$playlists = getPlaylistButtons($db_playlists, "test");

$db_playlists->close();

$body = <<<BODY
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
				<h2>Playlist</h2>
			</section>
			
			<section class="container list item-list">
				<ul>
					$playlists
				</ul>
			</section>

			<section class="container header">
                <a class="icon" href="Create Playlist.php"><i class="fa fa-plus-square-o" onclick=addSong() style="font-size: 50px; padding-bottom: 100px;"></i>
                </a>
            </section>

			<section class="container list item-list">
				<ul>
				<li>
					<a class='item' href='Liked Songs.php'>Liked Songs<i class='fa fa-angle-right'></i>
					</a>
				</li>
				</ul>
			</section>

			<section class="container nav">
				<center>
					<a class="icon" href="Home.php"><i class="fa fa-home" ></i></a>
					<a class="icon" href="Manage Playlists.php"><i class="fa fa-list" style="color: #FFFFFF;"></i></a>
					<a class="icon" href="Currently Playing.php"><i class="fa fa-play"></i></a>
				</center>
			</section>
		</body>
BODY;

echo genPage("Playlists", $body);
?>