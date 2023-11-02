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
   
}

function generateRecipeNameSection() {
    echo '<label> recipe name </label>';
    echo '<input type = "text" name = "recipeName" />';
    echo    '<div>';
    echo     '<label> recipe description </label>';
    echo     '<input type = "text" name = "recipeDesc" />';
    echo    '<div>';      

    echo '<label> This Serves: </label>';
    echo '<label> 1 Person </label>';
    echo '<input type = "radio" name = "servingSize" value = "single" checked>';
    echo '<label> 2 People </label>';
    echo '<input type = "radio" name = "servingSize" value = "double">';
    echo '<label> 3 People </label>';
    echo '<input type = "radio" name = "servingSize" value = "triple">';
}



 /*
               <div>
                    <label> Quantity </label>
                    <input type = "text" name = "qty1" />
                </div>
                <div>
                    <label> Measurement </label>
                    <select name = "measurement1">
                        <option value = "">None </option>
                        <option value = "pound">pound(s) </option>                
                        <option value = "gram">gram(s) </option>
                        <option value = "ounce">ounce(s) </option>
                        <option value = "piece">pcs </option>
                        <option value = "miliLiter">ml </option>
                        <option value = "tblSpoon">tbl spoon </option>
                        <option value = "teaSpoon">teaspoon </option>            
                        <option value = "cup">cup </option>          
                    </select> 
                </div>
                <div>
                    <label> Item </label>
                    <input type = "text" name = "item1" />  
                </div>
            </div>
            <!--2nd Box-->
            <div class="threeColumn">
                <div>
                    <label> Quantity </label>
                    <input type = "text" name = "qty2" />
                </div>
                <div>
                    <label> Measurement </label>
                    <select name = "measurement2">
                        <option value = "">None </option>
                        <option value = "pound">pound(s) </option>                
                        <option value = "gram">gram(s) </option>
                        <option value = "ounce">ounce(s) </option>
                        <option value = "piece">pcs </option>
                        <option value = "miliLiter">ml </option>
                        <option value = "tblSpoon">tbl spoon </option>
                        <option value = "teaSpoon">teaspoon </option>            
                        <option value = "cup">cup </option>          
                    </select> 
                </div>
                <div>
                    <label> Item </label>
                    <input type = "text" name = "item2" />  
                </div>
            </div>
            <!--3rd Box-->
            <div class="threeColumn">
                <div>
                    <label> Quantity </label>
                    <input type = "text" name = "qty3" />
                </div>
                <div>
                    <label> Measurement </label>
                    <select name = "measurement3">
                        <option value = "">None </option>
                        <option value = "pound">pound(s) </option>                
                        <option value = "gram">gram(s) </option>
                        <option value = "ounce">ounce(s) </option>
                        <option value = "piece">pcs </option>
                        <option value = "miliLiter">ml </option>
                        <option value = "tblSpoon">tbl spoon </option>
                        <option value = "teaSpoon">teaspoon </option>            
                        <option value = "cup">cup </option>          
                    </select> 
                </div>
                <div>
                    <label> Item </label>
                    <input type = "text" name = "item3" />  
                </div>
            </div>
            <!--4th Box-->
            <div class="threeColumn">
                <div>
                    <label> Quantity </label>
                    <input type = "text" name = "qty4" />
                </div>
                <div>
                    <label> Measurement </label>
                    <select name = "measurement4">
                        <option value = "">None </option>
                        <option value = "pound">pound(s) </option>                
                        <option value = "gram">gram(s) </option>
                        <option value = "ounce">ounce(s) </option>
                        <option value = "piece">pcs </option>
                        <option value = "miliLiter">ml </option>
                        <option value = "tblSpoon">tbl spoon </option>
                        <option value = "teaSpoon">teaspoon </option>            
                        <option value = "cup">cup </option>          
                    </select> 
                </div>
                <div>
                    <label> Item </label>
                    <input type = "text" name = "item4" />  
                </div>
            </div>
            <!--5th Box-->
            <div class="threeColumn">
                <div>
                    <label> Quantity </label>
                    <input type = "text" name = "qty5" />
                </div>
                <div>
                    <label> Measurement </label>
                    <select name = "measurement5">
                        <option value = "">None </option>
                        <option value = "pound">pound(s) </option>                
                        <option value = "gram">gram(s) </option>
                        <option value = "ounce">ounce(s) </option>
                        <option value = "piece">pcs </option>
                        <option value = "miliLiter">ml </option>
                        <option value = "tblSpoon">tbl spoon </option>
                        <option value = "teaSpoon">teaspoon </option>            
                        <option value = "cup">cup </option>          
                    </select> 
                </div>
                <div>
                    <label> Item </label>
                    <input type = "text" name = "item5" />  
                </div>
            </div>
            <!--6th Box-->
            <div class="threeColumn">
                <div>
                    <label> Quantity </label>
                    <input type = "text" name = "qty6" />
                </div>
                <div>
                    <label> Measurement </label>
                    <select name = "measurement6">
                        <option value = "">None </option>
                        <option value = "pound">pound(s) </option>                
                        <option value = "gram">gram(s) </option>
                        <option value = "ounce">ounce(s) </option>
                        <option value = "piece">pcs </option>
                        <option value = "miliLiter">ml </option>
                        <option value = "tblSpoon">tbl spoon </option>
                        <option value = "teaSpoon">teaspoon </option>            
                        <option value = "cup">cup </option>          
                    </select> 
                </div>
                <div>
                    <label> Item </label>
                    <input type = "text" name = "item6" />  
                </div>
            </div>
            <!--7th Box-->
            <div class="threeColumn">
                <div>
                    <label> Quantity </label>
                    <input type = "text" name = "qty7" />
                </div>
                <div>
                    <label> Measurement </label>
                    <select name = "measurement7">
                        <option value = "">None </option>
                        <option value = "pound">pound(s) </option>                
                        <option value = "gram">gram(s) </option>
                        <option value = "ounce">ounce(s) </option>
                        <option value = "piece">pcs </option>
                        <option value = "miliLiter">ml </option>
                        <option value = "tblSpoon">tbl spoon </option>
                        <option value = "teaSpoon">teaspoon </option>            
                        <option value = "cup">cup </option>          
                    </select> 
                </div>
                <div>
                    <label> Item </label>
                    <input type = "text" name = "item7" />  
                </div>
            </div>
            <!--8th Box-->
            <div class="threeColumn">
                <div>
                    <label> Quantity </label>
                    <input type = "text" name = "qty8" />
                </div>
                <div>
                    <label> Measurement </label>
                    <select name = "measurement8">
                        <option value = "">None </option>
                        <option value = "pound">pound(s) </option>                
                        <option value = "gram">gram(s) </option>
                        <option value = "ounce">ounce(s) </option>
                        <option value = "piece">pcs </option>
                        <option value = "miliLiter">ml </option>
                        <option value = "tblSpoon">tbl spoon </option>
                        <option value = "teaSpoon">teaspoon </option>            
                        <option value = "cup">cup </option>          
                    </select> 
                </div>
                <div>
                    <label> Item </label>
                    <input type = "text" name = "item8" />  
                </div>
            </div>
            <!--9th Box-->            
            <div class="threeColumn">
                <div>
                    <label> Quantity </label>
                    <input type = "text" name = "qty9" />
                </div>
                <div>
                    <label> Measurement </label>
                    <select name = "measurement9">
                        <option value = "">None </option>
                        <option value = "pound">pound(s) </option>                
                        <option value = "gram">gram(s) </option>
                        <option value = "ounce">ounce(s) </option>
                        <option value = "piece">pcs </option>
                        <option value = "miliLiter">ml </option>
                        <option value = "tblSpoon">tbl spoon </option>
                        <option value = "teaSpoon">teaspoon </option>            
                        <option value = "cup">cup </option>          
                    </select> 
                </div>
                <div>
                    <label> Item </label>
                    <input type = "text" name = "item9" />  
                </div>
            </div>
            <!--10th Box-->
            <div class="threeColumn">
                <div>
                    <label> Quantity </label>
                    <input type = "text" name = "qty10" />
                </div>
                <div>
                    <label> Measurement </label>
                    <select name = "measurement10">
                        <option value = "">None </option>
                        <option value = "pound">pound(s) </option>                
                        <option value = "gram">gram(s) </option>
                        <option value = "ounce">ounce(s) </option>
                        <option value = "piece">pcs </option>
                        <option value = "miliLiter">ml </option>
                        <option value = "tblSpoon">tbl spoon </option>
                        <option value = "teaSpoon">teaspoon </option>            
                        <option value = "cup">cup </option>          
                    </select> 
                </div>
                <div>
                    <label> Item </label>
                    <input type = "text" name = "item10" />  
                </div>
            </div>
        </div>

    */



 // and so on...

?>