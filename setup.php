<?php
    //Run me once if you haven't yet! This sets up a table you need
    require("methods.php");
    $db_songs = connectSongs();
    $db_playlists = connectPlaylists();
    $db_users = connectUsers();

    $query = "create table if not exists `playlists` ( Name varchar(256) not null, Skip int ) ";
    if (!$db_playlists->query($query)){
        echo "Error creating playlist playlist: ".$db_playlists->error;
        return;
    }

    session_start();

    if (isset($_GET["setuser"])){
        $_SESSION['username'] = $_GET["setuser"];
    }

     // createPlaylist($db_songs, $db_playlists, $db_users, "test", "Best of Kendrick Lamar", 50);

     // addUser($db_users, "test");

    //addSong($db_songs, "Best of Kendrick Lamar", "duckworth");
    //addSong($db_songs, "Best of Kendrick Lamar", "YAH");
    //addSong($db_songs, "Best of Kendrick Lamar", "alright");
    //addSong($db_songs, "Best of Kendrick Lamar", "humble");

?>
