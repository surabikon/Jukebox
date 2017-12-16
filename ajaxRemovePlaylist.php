<?php
    require("methods.php");

    $db_songs = connectSongs();
    $db_playlists = connectPlaylists();
    $db_users = connectUsers();

    if (isset($_POST['name'])){
        $name = $_POST['name'];
        echo removePlaylist($db_songs, $db_playlists, $db_users, "test", $name);
    }

    $db_songs->close();
?>