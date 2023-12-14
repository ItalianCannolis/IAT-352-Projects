<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
</head>
<body>


                <?php
                session_start();
                include(dirname(__FILE__).'\queryfunction.php');
                include(dirname(__FILE__).'\header.php');
                include(dirname(__FILE__).'\profile_functions.php');
                
                ?>



    <main>
        <section class="profile-info">
            <h1>User Profile</h1>
            <?php
            if(isset($_SESSION['username'])) {

                $member_data = find_member_data_by_mem_id($_SESSION['mem_id']);
                $path = "img";
                if($member_data[0] != null) {

                    //$user = $result->fetch_assoc();
                    //  information on the profile page
                    echo "<div class='user-details'>";

                    echo storeDispProfileImg($member_data[2], $path);
                    echo "<p>Username: {$member_data[0]}</p>";
                    echo "<p>Email: {$member_data[1]}</p>";
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

