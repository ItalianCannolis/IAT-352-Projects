<?php
    $dbhost = "localhost"; // or the host (whatever ur running)
    $dbuser = "root"; // user created (using lab 6 so just going to leave it here for now)
    $dbpass = ""; //empty because no password (using lab 6 so just going to leave it here for now)
    $dbname = "classicmodels"; //db working with 

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

// if error make sure echo 
if(mysqli_connect_errno()){
  echo mysqli_connect_error();
}

// proces form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $orderNumber = $_POST["orderNumber"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    // chk order nmber or date range selected
    if (!empty($orderNumber)) {
        $whereClause = "orders.orderNumber = $orderNumber";
    } elseif (!empty($startDate) && !empty($endDate)) {
        $whereClause = "orders.orderDate BETWEEN '$startDate' AND '$endDate'";
    } else {
        die("Please select an order number or specify a date range.");
    }

    // sql query (using example from a3 description) also from classic models
    $selectedColumns = implode(",", $_POST["columns"]);
    $sql = "SELECT $selectedColumns
            FROM orders
            JOIN orderdetails ON orders.orderNumber = orderdetails.orderNumber
            JOIN products ON orderdetails.productCode = products.productCode
            WHERE $whereClause";

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
        echo "Query failed: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
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
        .checkbox-section {
            margin-left: 10px; /* 10-20 seems reasonable */
        }
    </style>
</head>
<body>
    <h2>Query</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="orderNumber">Order Number:</label>
        <select name="orderNumber">
            <!-- ordernumber dropdown menu -->

            <option value ="">Choose Order</option>
 
            <option value="10100">10100</option>
            <option value="10101">10101</option>
            <option value="10102">10102</option>
            <option value="10103">10103</option>
            <option value="10104">10104</option>
            <option value="10105">10105</option>
            <option value="10106">10106</option>
            <option value="10107">10107</option>
            <option value="10108">10108</option>
            <option value="10109">10109</option>
            <option value="10110">10110</option>
            <option value="10111">10111</option>
            <option value="10112">10112</option>
            <option value="10113">10113</option>
            <option value="10114">10114</option>
            <option value="10115">10115</option>
            <option value="10116">10116</option>
            <option value="10117">10117</option>
            <option value="10118">10118</option>
            <option value="10119">10119</option>
            <option value="10120">10120</option>
            <option value="10121">10121</option>
            <option value="10122">10122</option>
            <option value="10123">10123</option>
            <option value="10124">10124</option>
            
            
            <!-- can add more depending on size (currently only 24) -->
        </select>
        <br>
<!--  still unsure how to search by data will have it here as placeholder-->
        <label for="startDate">Start Date:</label>
        <input type="date" name="startDate">
        <br>

        <label for="endDate">End Date:</label>
        <input type="date" name="endDate">
        <br>

        
        <!-- create the checkbox column that returns value-->
        <div class="checkbox-section">
            <label>Select Columns to Display:</label>
            <br>
            <input type="checkbox" name="columns[]" value="orderDate" checked> Order Date
            <input type="checkbox" name="columns[]" value="requiredDate" checked> Required Date
            <input type="checkbox" name="columns[]" value="productName" checked> Product Name
            <input type="checkbox" name="columns[]" value="productDescription" checked> Product Description
            <input type="checkbox" name="columns[]" value="quantityOrdered" checked> Quantity Ordered
            <input type="checkbox" name="columns[]" value="priceEach" checked> Price Each
            <br>
        </div>

        <input type="submit" value="SearchOrder">
    </form>

    
</body>
</html>

















<!-- select id, name from employee -->
<!-- fetch_row [1, 'David'] -->
<!-- -->
<!-- -->
<!-- -->