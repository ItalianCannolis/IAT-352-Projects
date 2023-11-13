<?php





function generateForm(){
    echo '
        <div class ="recipetitle">
            <h2> Select Order Parameters </h2>
        </div>

        <form method = "POST" action = "process-recipe.php" > 
            <label> Order Number: </label>
            <input type = "text" name = "orderNum" />

            <div>
                <label> Order Date (YYYY - MM - DD) </label>
                <input type = "text" name = "startDate" />
                <input type = "text" name = "endDate" />
            </div> 
            
            <div>
            <label> Select Columns to Display </label> 
            </div>

            <div>
                <input type="checkbox" id="orderNumDisp" name="ordernumdisp" value="True">
                <label for="orderNumDisp"> Order Number</label><br>

                <input type="checkbox" id="orderDateDisp" name="orderDateDisp" value="True">
                <label for="orderDateDisp"> Order Date</label><br>

                <input type="checkbox" id="shipDateDisp" name="shipDateDisp" value="True">
                <label for="shipDateDisp"> Shipped Date </label><br>

                <input type="checkbox" id="productNameDisp" name="productNameDisp" value="True">
                <label for="productNameDisp"> Product Name</label><br>

                <input type="checkbox" id="productDescDisp" name="productDescDisp" value="True">
                <label for="productDescDisp"> Product Description </label><br>

                <input type="checkbox" id="quantityDisp" name="quantityDisp" value="True">
                <label for="quantityDisp"> Quantity Ordered</label><br>

                <input type="checkbox" id="priceDisp" name="priceDisp" value="True">
                <label for="priceDisp"> Price Each</label><br>
            </div>

            <div>
                <input type = "submit" value = "Search Orders" >
            </div>
        </form>
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


?>