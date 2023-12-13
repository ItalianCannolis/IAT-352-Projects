<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>


                <?php
                session_start();
                include(dirname(__FILE__).'\queryfunction.php');
                include(dirname(__FILE__).'\header.php');
                
                ?>



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

