<!-- first, you should read the csv file and get the data -->

<!-- then simply loop over the data and create a new html list entry with hrefs to the e_show_recipe.php file -->
<!-- if you want to save yourself some time, make the hrefs something like -->
	echo "<li><a href='e_show_recipe.php?index=$index'>" . htmlspecialchars($recipe[0]) . "</a></li>";
<!-- where $index is the index of the recipe in the array -->

<!-- then, in the e_show_recipe.php file, you can get the index from the url and use it to get the recipe from the array! -->
<!-- NEAT, this way you don't have to explicitly define a get request -->

