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
?>