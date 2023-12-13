<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About</title>
    <link href="./css/styles.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1 class="navtitle"><a href="index.php">Vinyl Visions</a></h1>
        <nav class="navchild">
            <ul class="nav_links">
                <?php
                $url = $_SERVER['REQUEST_URI'];
                $urlcheck = parse_url($url, PHP_URL_PATH);
                $urlcheck = str_split($urlcheck);
                $urlcheck = implode($urlcheck);
                $urlcheck = explode('/',$urlcheck);
                

                if (isset($_SESSION['username'])) {
                    echo '<li><a href="logout.php">Logout</a></li>';
                    echo '<li><a href="profile.php">Profile</a></li>';
                    echo "<li><a href='cover_art_getter.php'>Collage</a></li>";
                    if(end($urlcheck) == "profile.php"){
                        echo '<li><a href="edit_profile.php">Edit Profile</a></li>';
                    }
                } else {
                    // echo '<li><a href="login.php">Sign in</a></li>';
                    echo '<li><a href="register.php">Register</a></li>';
                    echo "<li><button onclick='location.href = 'login.php';' id='myButton' class='submit-button'>Sign in</button></li>";

                }
                ?>
                <li><a href="cover_art_search.php">Search Cover Arts</a></li>
                <li><a href="cover_art_getter.php">Cover Art Catalogue</a></li>
                <!---<li><a href="cover_art_getter.php">Collage</a></li> -->
                <li>
            </ul>
        </nav>
    </header>
</body>
</html>
