<html>
    <head>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">


        <link rel="stylesheet" href="CSS/style_sheet.css">

    </head>

    <body>
    
        <div class="navbar">
            <h1> Chef's Reminder </h1>
            <a href="add_recipe.php">Add Recipes</a>
            <a href="list_recipes.php">See Recipes</a>
        </div>
        <section >
            <div class ="recipetitle">
                <h2> Add Recipe </h2>
            </div>
            <form method = "POST" action = "process-recipe.php" class="recipeform">

                <label> Recipe Name </label>
                    <input type = "text" name = "recipeName" class = "thickbox"/>
                <div>
                    <label> Recipe Description </label>
                    <input type = "text" name = "recipeDesc" class = "bigbox" />
                <div>      

                    <label> This Serves: </label>
                    
                    <input type = "radio" name = "servingSize" value = "single" checked>
                    <label> 1 Person </label>
                    
                    <input type = "radio" name = "servingSize" value = "double"> 
                    <label> 2 People </label>
                    
                    <input type = "radio" name = "servingSize" value = "triple">
                    <label> 3 People </label>

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
                </div>
                <div>
                    <label> Recipe Steps: </label>
                    <input type = "text" name = "recipeStep" class = "bigbox"/> 
                </div>


                <div>
                    <label> Recipe Tags (seperate each tag with a comma) </label>
                    <input type = "text" name = "recipeTags" class = "bigbox"/> 
                </div>
                <div class = "submitdiv">
                    <input type = "submit" value = "Publish" class = "submitbtn">
                </div>
            </form>

        </section>
        
    </body>
</html>