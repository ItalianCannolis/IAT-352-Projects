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
                

                if(isset($_POST['new_profile_pic'])){

  
                     //Store the file extension or type 
                    $type = $_FILES["new_profile_pic"]["type"]; 
                  
                    // Store the file size 
                    $size = $_FILES["new_profile_pic"]["size"]; 

                    //echo filesize($_POST['new_profile_pic']);
                    $extensionCheck = explode('/',$type);
                    $ext = end($extensionCheck);
                    $imgData = file_get_contents($_FILES["new_profile_pic"]['tmp_name']);

                    if (($ext == 'png' || $ext == 'jpeg') && $size <= 63000) {
                        echo 'worked';
                        upload_profile_pic_by_mem_id($_SESSION['mem_id'],$imgData);
                    }
                    else if ($ext != 'png' || $ext != 'jpeg'){

                        echo 'please insert either .jpg or .png file please';

                    }
                    else{
                        echo 'File size too big, less than 63 kb please';

                    }
                }
                ?>



    <main>
        <section class="profile-info">
            <h1>Edit User Profile</h1>
            <?php
            if(isset($_SESSION['username'])) {

                $member_data = find_member_data_by_mem_id($_SESSION['mem_id']);
                $path = "img";
                if($member_data[0] != null) {

                    //$user = $result->fetch_assoc();
                    //  information on the profile page
                    echo "<div class='user-details'>";

                    echo storeDispProfileImg($member_data[2], $path);
                    echo "<form action='edit_profile.php' method='post' enctype='multipart/form-data'>";
                    echo "Select image to upload (.png,.jpg only, less than 63 kb):";
                    echo "<input type='file' name='new_profile_pic' id='new_profile_pic'>";
                    echo "<input type='submit' name='new_profile_pic'>";
                    echo "</form>";



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