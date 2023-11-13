<!-- simply extract the $index value from the URL -->

<!-- then use it to get the correct recipe row from the array -->

<!-- then display the recipe's information! -->

<!-- you should add a button to navigate back to d_list_recipes.php -->

<!-- and that's it! -->
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
        <a href="index.php">See Recipes</a>
    </div>   
    
    
    <section>
            <?php

                

                include 'index.php';
                $index = " ";

                extractindex();

                $recipename = $recipes[$index][0];
                $recipedescription = $recipes[$index][1];  
                $recipeserving = $recipes[$index][2];
                $recipeitems = array();
                $recipeinstructions = $recipes[$index][4];
                $recipetags = array();




                extractlistvalues();
                printRecipeBasics();
                printIngredients();
                printRecipeExtras();
                function extractindex(){
                    $curPageName =  $_SERVER['REQUEST_URI'];
                    global $index;
                    $indexcheck = parse_url($curPageName, PHP_URL_QUERY);
                    $indexcheck = str_split($indexcheck);

                    for ($i = 0; $i< count($indexcheck); $i++){

                        if($i > 5){
                        $index = $index.$indexcheck[$i];
                
                        }
                
                    }

                    $index = explode(" ", $index);
                    $index = (int)$index[1];
                }

                function extractlistvalues(){
                    
                    global $recipes;
                    global $index;
                    global $recipetags;
                    global $recipeitems;

                    $recipeitemlist = $recipes[$index][3];
                    $recipeitemlist = explode("+++",$recipeitemlist);

                    for ($i = 0; $i< count($recipeitemlist); $i++){

                        $recipeitems[$i] = explode("#",$recipeitemlist[$i]);
                
                    }
                
                    if(count($recipes[$index]) > 5){
                        $y = 0;
                        for ($i = 5; $i< count($recipes[$index]); $i++){
                
                        $recipetags[$y] = $recipes[$index][$i];
                        $y++;
                
                        }
                    }

                }


                function printRecipeBasics(){

                    global $recipename;
                    global $recipedescription;
                    global $recipeserving;

                    if($recipeserving == "single"){
                        $recipeserving = "One";
                    }
                    else if($recipeserving == "double"){
                        $recipeserving = "Two";
                    }
                    else if($recipeserving == "triple"){
                        $recipeserving = "Three";
                    }

                    echo"  
                    <div class='recipetitle'>
                        <h2>".$recipename." </h2>
                    </div>
                    ";
                    echo"
                    <div>
                        <h3>Serving Size: </h3>
                        <p>$recipeserving People </p>
                    </div>
                    ";
                    echo"
                    <div>
                        <h3>Description: </h3>
                        <p>".$recipedescription. " </p>
                    </div>
                    ";
                }
                function printIngredients(){

                    global $recipeitems;

                    echo"
                        <h3>Ingredients: </h3>
                    ";

                    for ($i = 0; $i< count($recipeitems); $i++){

                        $displayCount = $i+1;
                            echo"                
                            <div class='recipeColumn'>
                                <div>
                                    <p>Ingredient ".$displayCount.": ".$recipeitems[$i][0]." ".$recipeitems[$i][1]." ".$recipeitems[$i][2]. " </p>
                                </div>

                            </div>
                            ";
                            
            
                    }




                }

                function printRecipeExtras(){
                    global $recipeinstructions;
                    global $recipetags;


                    echo "<div>
                            <h3>Instructions: </h3>
                            <p>$recipeinstructions</p>
                        </div>
                    ";
                    
                    if(count($recipetags) > 0){
                        echo "<div>
                        <h3>Tags: </h3>
                        ";
                        echo "<p> ";
                        for ($i = 0; $i< count($recipetags); $i++){
                            
                            echo $recipetags[$i];

                            if(($i+1) < count($recipetags)){
                                echo ", ";
                            }
                            else{
                                echo "</p>";
                            }

                        }
                        echo "</div>";
                    }
                    
                }





            ?>
        </section>
    </body>
</html>