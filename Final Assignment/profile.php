<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1 class="navtitle"><a href="index.html">Vinyl Visions</a></h1>
        <nav class="navchild">
            <ul class="nav_links">
                <?php
                session_start();
                include(dirname(__FILE__).'\queryfunction.php');
                include(dirname(__FILE__).'\header.php');
                
                if (isset($_SESSION['username'])) {
                    echo '<li><a href="logout.php">Logout</a></li>';
                    echo '<li><a href="profile.php">Profile</a></li>';
                    echo '<li><a href="edit_profile.php">Edit Profile</a></li>'; //<!-- Only visible for logged-in users -->
                } else {
                    echo '<li><a href="login.php">Sign in</a></li>';
                    echo '<li><a href="register.php">Register</a></li>';
                    exit(); // Exit 
                }
                ?>
                <li><a href="cover_art_search.php">Search Cover Arts</a></li>
                <li><a href="cover_art_getter.php">Cover Art Catalogue</a></li>
                <li><a href="cover_art_collage.php">Collage</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="profile-info">
            <h1>User Profile</h1>
            <?php
            if(isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                // fetch user data based on the username
                $db = db_connect();
                $query = "SELECT * FROM member WHERE username = ?";
                
                $stmt = $db->prepare($query);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();

                if($result->num_rows === 1) {

                    $user = $result->fetch_assoc();
                    //  information on the profile page
                    echo "<div class='user-details'>";
                    echo "<p>Username: {$user['username']}</p>";
                    echo "<p>Email: {$user['email']}</p>";
                    //  user details as needed
                    echo "</div>";
                } else {
                    echo "User not found.";
                }
            } else {
                echo "Please log in to view your profile.";
            }
            ?>
        </section>
    </main>
</body>
</html>

