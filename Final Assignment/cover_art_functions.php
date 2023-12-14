<?php 


function generate_dropdown($collageNames){
echo '<form action="cover_art_getter.php" method="post">';
echo '<label for="collages">Choose a collage:</label>
<select id="collagename" name="collagename">';


for ($x = 0; $x < count($collageNames); $x++){
    echo "<option value=".$collageNames[$x].">".$collageNames[$x]."</option>";


}


echo "</select>";
echo '<input type="submit">
</form>';

}

function generate_dropdown_addition($collageNames,$urlfull){

    echo "<form action='$urlfull' method='post'>";
    echo '<label for="collages">Choose a collage:</label>
    <select id="collagename" name="collagename">';
    
    
    for ($x = 0; $x < count($collageNames); $x++){
        echo "<option value=".$collageNames[$x].">".$collageNames[$x]."</option>";
    
    
    }



echo "</select>";

echo '<input type="submit">
</form>';

}

function generate_new_collage_form(){
    echo '<form action="cover_art_getter.php" method="post">';
    echo '<label for="newCollage">Create a new collage:</label>
    <input type="text" name = "newCollage">';
    echo '<input type="submit">
    </form>';
    
    }
?>