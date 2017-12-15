<?php
    require("methods.php");

    $db_songs = connectSongs();


    if (isset($_POST['songname']) && isset($_POST['roomcode'])){
        $song = $_POST['songname'];
        $room = $_POST['roomcode'];
        echo removeSong($db_songs, $room, $song);
    }

    $db_songs->close();
?>
