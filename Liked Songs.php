<?php
require("methods.php");

session_start();
if (!isset($_SESSION['username'])) {
	$username = "Test Username";
} else {
	$username = $_SESSION['username'];
}

$onload = "";
$db_songs = connectSongs();
$pName = "Liked Songs";

$songs = getSongs($db_songs, $pName);
if ($songs){
	foreach ($songs as &$s){
		$title = $s[1];
		$onload .= "addNewSong(\"$title\"); ";
	}
}

$db_songs->close();

$body = <<<BODY
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href='https://fonts.googleapis.com/css?family=Codystar' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Lobster Two' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Marvel' rel='stylesheet'>

		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>
			$(function() {
				$( "#sortable-1" ).sortable();
				$( "#addNew" ).sortable();
			});
		</script>
		<script>
			window.onload = function() {
				$onload
		}
		</script>
		<script>
			var songCount = 0;

			function addSong(){
				var song = document.getElementById('songentry').value;
				ajaxAdd(song);
			}

			function ajaxAdd(name){
				$.ajax({
					url: 'ajaxAdd.php',
			        type: 'post',
			        data: { songname: '' + name, roomcode: '$pName'},
					success: function(data){
						addNewSong(data);
					}
         		});
			}

			function ajaxRemove(name){
				$.ajax({
					url: 'ajaxRemove.php',
			        type: 'post',
			        data: { songname: '' + name, roomcode: '$pName'},
					success: function(data){
						alert(data);
					}
         		});
			}

			function addNewSong(songName) {
				songCount = songCount + 1;
				var currCount = songCount;
				var icon = document.createElement('i');
				icon.className ="fa fa-reorder";
				icon.style = "color:black; font-size: 20px; padding-right:5px";
				icon.id = "icon" + currCount;

				var box = document.createElement('div');
				var listItem = document.createElement('li');

				box.className = "list-item-container";
				var node = document.createTextNode(songName);
				box.appendChild(node);
				listItem.id = "song" + currCount
				var close = document.createElement('i');
				close.className = "fa fa-close";
				close.style = "position: absolute; right: 20px; line-height: 50px";
				close.id = "delete";
				close.onclick = function() {removeSong(currCount, songName)};

				box.appendChild(close);
				listItem.appendChild(icon);
				listItem.appendChild(box);
				var element = document.getElementById("addNew");
				element.appendChild(listItem);
			}

			function removeSong(songCount, songName) {
				var parent = document.getElementById("addNew");

				var child = document.getElementById("song"+ songCount);
				var iconChild = document.getElementById("icon"+ songCount);

				parent.removeChild(child);
				parent.removeChild(iconChild);

				ajaxRemove(songName);
			}

			function removePlaylist() {
				if (confirm("Are you sure you want to delete this playlist?")) {
					window.location.href = "Playlists.php"
					//will also later remove all instances of playlist
				}
			}
		</script>
	</head>

	<body>
		<section class="container topnav">
			<center>
				<a class="icon" href="Home.php" style="position: fixed; left: 0;"><i class="fa fa-user-circle-o">
					<section class="container topnavtext">
						$username
					</section>
				</i></a>
				<a class="icon" href="Home.php" style="position: fixed; right: 0;"><i class="fa fa-sign-out">
					<section class="container topnavtext">
						Logout
					</section>
				</i></a>
			</center>
		</section>

		<section class="container header">
			<h1>JUKEBOX</h1>
			<h2>Liked Songs</h2>
		</section>

		<section class="container list item-list">
			<ul id="addNew">
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
