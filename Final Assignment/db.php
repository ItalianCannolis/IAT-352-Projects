<?php
    define("DB_SERVER", "localhost");// or the host (whatever ur running)
    define("DB_USER", "root"); // empty user created 
    define("DB_PASS", ""); //empty because no password 
    define("DB_NAME", "musicbrainz"); //db working with 

    $validValue = true;



function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER,DB_PASS, DB_NAME);
    // if error make sure echo 
    if(mysqli_connect_errno()){
        echo mysqli_connect_error();
    } 
    return $connection;
}

function db_disconnect($connection) {
    if(isset($connection)) {
        mysqli_close($connection);
    }
}

?>