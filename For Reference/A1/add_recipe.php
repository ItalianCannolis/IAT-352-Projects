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
            include 'b_form_functions.php';
            create_recipe_form()
            ?>

        </section>
    </body>
</html>