<?php 


function generate_dropdown($collageNames){
echo '<label for="collages">Choose a car:</label>
<select id="collagename" name="collagename">';

for ($x = 0; $x < count($collageNames); $x++)
    echo "<option value=".$collageNames[$x].">".$collageNames[$x]."</option>";


}
echo "</select>";
?>