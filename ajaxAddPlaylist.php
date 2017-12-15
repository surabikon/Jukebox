<?php
    require("methods.php");

    $db_songs = connectSongs();
    $db_playlists = connectPlaylists();
    $db_users = connectUsers();

    if (isset($_POST['name'])){
        $name = $_POST['name'];
        echo createPlaylist($db_songs, $db_playlists, $db_users, "test", $name, 0);
    }

    $db_songs->close();
?>
