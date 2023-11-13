<!-- first, you should read the csv file and get the data -->

<!-- then simply loop over the data and create a new html list entry with hrefs to the e_show_recipe.php file -->
<!-- if you want to save yourself some time, make the hrefs something like -->

<!-- where $index is the index of the recipe in the array -->

<!-- then, in the e_show_recipe.php file, you can get the index from the url and use it to get the recipe from the array! -->
<!-- NEAT, this way you don't have to explicitly define a get request -->
<html>
    <head>
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">


        <link rel="stylesheet" href="CSS/style_sheet.css">

    </head>

            <?php
                
                $recipes = array();
                $recipesnames = array();
                function readRecipes(){
                    global $recipes;
                    $file = fopen('recipes/recipes.csv','r');
                    $i = 0;


                    while ($lineCSV = fgetcsv($file)){
                
                        $recipes[$i] = $lineCSV;
                        $i++;
                
                    }
                    fclose($file);


                }

                function getRecipes(int $recipenum){
                    global $recipes;
                    
                    return $recipe = $recipes[$recipenum];

                }

                readRecipes();
                $url = $_SERVER['REQUEST_URI'];
                $urlcheck = parse_url($url, PHP_URL_PATH);
                $urlcheck = str_split($urlcheck);
                $urlcheck = implode($urlcheck);

                if($urlcheck != "/IAT-352/Nathan_Cerone/A1/e_show_recipe.php"){
                    createPage();
                    for ($index = 0; $index< count($recipes); $index++){
                        echo "<li><a href='e_show_recipe.php?index=$index' class = 'recipeLink'>" . htmlspecialchars($recipes[$index][0]) . "</a></li>";
                    }
                    endPage();
                }

                function createPage(){
                    echo " 
                    <body>

                    <div class='navbar'>
                        <h1> Chef's Reminder </h1>
                        <a href='add_recipe.php'>Add Recipes</a>
                        <a href='index.php'>See Recipes</a>
                    </div>
                    
                    <section>
                    "

                    ;

                }

                function endPage(){
                    echo "        
                    </section>
                    </body>";

                }

            ?>

</html>