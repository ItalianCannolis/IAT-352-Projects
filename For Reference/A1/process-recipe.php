<html>

<?php
        $combined;
        $validValues = true;
        function checkValues(){

            if(isset ($_POST['recipeName']) && isset($_POST['recipeDesc']) && isset($_POST['servingSize']) && isset($_POST['recipeStep']) && isset($_POST['recipeTags']) && isset($_POST['0qty']) && isset($_POST['0unit']) && isset($_POST['0item']) ){
                global $validValues;
                for ($i = 0; $i< 10; $i++){
                    

                    $qtyname = strval($i)."qty";
                    $unitname = strval($i)."unit";
                    $itemname = strval($i)."item";
                    echo $_POST[$qtyname]. "<br>";
                    if(empty ( $_POST[$qtyname]) == false){
                        if(is_numeric($_POST[$qtyname]) == false){
                            returnRedirect();
                            $validValues = false;
                        }
                    }
                    if( (empty ( $_POST[$qtyname]) || empty($_POST[$unitname]) || empty($_POST[$itemname])) ){
    
                        if( (empty ( $_POST[$qtyname]) && empty($_POST[$unitname]) && empty($_POST[$itemname])) ){
                            break;
                        }
                        else {
                            returnRedirect();
                            $validValues = false;
                        }

                    }

                    
                }

                if(empty ($_POST['recipeName']) || empty($_POST['recipeDesc'])) {
                    returnRedirect();
                    $validValues = false;
                }
                else if(empty ($_POST['0qty']) || empty($_POST['0unit']) || empty($_POST['0item'])) {
                    returnRedirect();
                    $validValues = false;
                }
                else if(empty ($_POST['recipeStep'])) {
                    returnRedirect();
                    $validValues = false;
                }
                   

                
            }
        }
        

        function implodeCSVString(){
            $items = array();
            for ($i = 0; $i< 10; $i++){

                $qtyname = strval($i)."qty";
                $unitname = strval($i)."unit";
                $itemname = strval($i)."item";
                global $combined;
                $combinedstring;

                if( !(empty ( $_POST[$qtyname]) || empty($_POST[$unitname]) || empty($_POST[$itemname])) ){

                    $combinedstring = $_POST[$qtyname]."#".$_POST[$unitname]."#".$_POST[$itemname];
                    $items[$i] = $combinedstring;
                }
                else{
                    break;
                }

            }
            $combineditems = implode('+++',$items);
            $combined = $_POST['recipeName'].",".$_POST['recipeDesc'].",".$_POST['servingSize'].",".$combineditems.",".$_POST['recipeStep'].",".$_POST['recipeTags'];
            
            echo $combined;
        }

        function writeToFile(){
            $file = fopen('recipes/recipes.csv','r');
            global $combined;
            $duplicate = false;
            while ($lineCSV = fgetcsv($file)){
              if($lineCSV[0] == $_POST['recipeName']){
                $duplicate = true;
                break;
              }
      
            }
            fclose($file);
      
            if (!$duplicate){
              $file = fopen('recipes/recipes.csv','a');
        
              fwrite($file, "\n".$combined);
              fclose($file);
            }

        }

        function redirect(){
            $newURL = "index.php";
            header('Location: '.$newURL);
        }
        function returnRedirect(){
            $newURL = "add_recipe.php";
            header('Location: '.$newURL);
        }

        function processRecipe(){
            global $validValues;
            print $validValues;
            if ($validValues == true){
                implodeCSVString();
                writeToFile();
                redirect();
            }
        }
        
        checkValues();
        processRecipe();



        ?>

</html>