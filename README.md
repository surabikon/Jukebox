# Jukebox
A party music queue.

Authors: Jonathan Chan, Surabi Kondapaka, Daniel Sitnick, Vivian Yung

How to run (MAC OS):
1. Download and install [XAMPP](https://www.apachefriends.org/index.html).
2. Download files from repository and extract them to the directory you installed XAMPP in inside ./htdocs/Jukebox
3. Start the Apache servers and MySQL servers on XAMPP
4. Visit localhost/phpmyadmin in your web browser and create three (3) databases:
	a. jb_playlists
	b. jb_songs
	c. jb_users
5. Run localhost/Jukebox/setup.php
6. Visit localhost/Jukebox/Login.php