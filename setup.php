<?php
    //Run me once if you haven't yet! This sets up a table you need
    require("methods.php");
    $db_songs = connectSongs();
    $db_playlists = connectPlaylists();
    $db_users = connectUsers();

    $query = "create table if not exists `playlists` ( RoomCode varchar(256) not null, Name varchar(256) not null, Skip int ) ";
    if (!$db_playlists->query($query)){
        echo "Error creating playlist playlist: ".$db_playlists->error;
        return;
    }
    
    // createPlaylist($db_songs, $db_playlists, $db_users, "test", "Hello", "XXXXXX", 0);

    // addUser($db_users, "test");

    addSong($db_songs, "XXXXXX", "https://www.youtube.com/watch?v=tvTRZJ-4EyI");

?>
