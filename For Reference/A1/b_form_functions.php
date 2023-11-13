<?php

// I recommend creating the following functions:
// generateRecipeNameSection()
// generateIngredientsSection()
//		this function should create 3 inputs (iquantity, iunit and iname) X 10 times in a loop
// generateInstructionsSection()
// create_recipe_form()
//		this function should call the previous three functions to create a form.
//		the form should call c_submit_recipe.php when submitted, via a POST request.
//		also notice this is the only function being called in a_submit_recipe.php

// I'll get you started:
function create_recipe_form() {
    generateFormStart();
    generateRecipeNameSection();
    generateIngredientsSection();
    generateInstructionsSection();
    generateFormEnd();
}

function generateFormStart(){
        echo '
        <div class ="recipetitle">
            <h2> Add Recipe </h2>
        </div>        
        <form method = "POST" action = "process-recipe.php" class="recipeform">
        ';
}
function generateFormEnd(){
    echo '        
        <div class = "submitdiv">
            <input type = "submit" value = "Publish" class = "submitbtn">
        </div>
    </form>';
}


 function generateRecipeNameSection(){
    echo '



    <label> Recipe Name </label>
        <input type = "text" name = "recipeName" class = "thickbox"/>
    <div>
        <label> Recipe Description </label>
        <input type = "text" name = "recipeDesc" class = "bigbox" />
    </div>      
    <div>
        <label> This Serves: </label>
        
        <input type = "radio" name = "servingSize" value = "single" checked>
        <label> 1 Person </label>
        
        <input type = "radio" name = "servingSize" value = "double"> 
        <label> 2 People </label>
        
        <input type = "radio" name = "servingSize" value = "triple">
        <label> 3 People </label>
    </div> 
                ';
 }

 function generateIngredientsSection(){
    for ($i = 0; $i< 10; $i++){
        $qtyname = strval($i)."qty";
        $unitname = strval($i)."unit";
        $itemname = strval($i)."item";


        
        echo '
        <div class="threeColumn">
        <div>
            <label> Quantity: </label>
            <input type = "text" name ='. $qtyname. ' class = "thickbox">
        </div>
        <div>
            <label> Unit: </label>
            <select name ='. $unitname. ' class = "thickbox">
                <option value = "">None </option>
                <option value = "pound">pound(s) </option>                
                <option value = "gram">gram(s) </option>
                <option value = "ounce">ounce(s) </option>
                <option value = "piece">pcs </option>
                <option value = "miliLiter">ml </option>
                <option value = "tblSpoon">tbl spoon(s) </option>
                <option value = "teaSpoon">teaspoon(s) </option>            
                <option value = "cup">cup(s) </option>          
            </select> 
        </div>
        <div>
            <label> Item: </label>
            <input type = "text" name ='. $itemname. ' class = "thickbox">  
        </div>
        </div>';
    }
 }

 function generateInstructionsSection(){
    echo '

        <label> Recipe Steps: </label>
            <input type = "text" name = "recipeStep" class = "bigbox"/> 
        </div>


        <div>
            <label> Recipe Tags (seperate each tag with a comma) </label>
            <input type = "text" name = "recipeTags" class = "bigbox"/> 
        </div>

        ';
 }
 // and so on...

?>