<?php 
 include 'header.php';
 include 'queryfunction.php';

 $db = db_connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $orderNumber = $_POST["orderNumber"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    // chk order nmber and ensure valid value or date range selected
    if (!empty($orderNumber) && is_numeric($orderNumber) == true) {
        $ifelseCondition = "orders.orderNumber = $orderNumber";
    } else if (!empty($startDate) && !empty($endDate)) {
    //make sure btwn start and end for searching
        $ifelseCondition = "orders.orderDate BETWEEN '$startDate' AND '$endDate'";
    } else {
    //if not btwn or there is no order number selected return msg
        echo "Please select an order number or specify a date range.";
    }

    // sql query (using example from a3 description) also from classic models
    $selectedColumns = implode(",", $_POST["columns"]);
    // formatted to structure and examples in lab 5, Find order,details, number.... where condition needed to chk validity
    $sql = "SELECT $selectedColumns FROM orders JOIN orderdetails ON orders.orderNumber = orderdetails.orderNumber
            JOIN products ON orderdetails.productCode = products.productCode WHERE $ifelseCondition";

    // display it
    echo "<h3>SQL Query:</h3>";
    echo "<p>$sql</p>";

    // run query
    $result = mysqli_query($conn, $sql);

    // create the table
    if ($result) {
        echo "<h3>Results:</h3>";
        echo "<table border='1'>
                <tr>";

        // make table column
        foreach ($_POST["columns"] as $column) {
            echo "<th>$column</th>";
        }

        echo "</tr>";

        // make rows from fetch
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($_POST["columns"] as $column) {
                echo "<td>{$row[$column]}</td>";
            }
            echo "</tr>";
        }

        //incase of errors echo failure

        echo "</table>";
    } else {
        echo "Query failed: " . mysqli_error($db);
    }
}

mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database Query Form</title>
    <style>
        /* trying to add css (339) to make it look like the example */
        form {
            display: flex;
            flex-direction: column;
        }
        /* spaces btwn boxes */
        .checkbox-section {
            margin-left: 10px; /* 10 seems reasonable */
        }
        /* styling page button to specific width and location */
        input[type="submit"] {
            max-width: 200px; 
            margin-top: 10px; 
        }
    </style>
</head>
<body>
    <header>
        <nav class="navchild">
            <ul class="nav_links">
                <!-- linking to each albun art on database? -->
            </ul>
        </nav>
    </header>

    <h2>Search Cover Arts</h2>
    <form method="get" action="cover_art_search.php">
        <!-- search for cover art -->
        <input type="text" name="search_term" placeholder="search cover art">
        <input type="submit" value="Search">
    </form>

</body>

</html>

