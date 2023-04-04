<!DOCTYPE html>

<head>
    <link href="basic.css" type="text/css" rel="stylesheet">
</head>

<html>

    <body>
       
	<center>
        <h1>Restaurant</h1>
        <nav>
            <a class="active" href="restaurant.php">Order History</a> |
            <a href="">Add New Customer</a> |
            <a href="">All Orders</a> |
            <a href="">Employees</a>
        </nav>
    </center>
	
	<br>
    <?php
        
    ?>
	
	<form action="getOrders.php" method="post">
        <label for="date">Select a Date to see order details:</label>
		<input type="date" id="date" name="orderDate">
		<input type="submit">
	</form>

    <?php
        $date = $_POST["orderDate"];
        echo "<h2>".$date."</h2>";

        include 'connectDB.php';
        echo "<br>";

        //run a query
        $result = $connection->query("select  from employee");

        //process results
        while ($row = $result->fetch()) {
            echo "<li>".$row["EmailAddress"].", ".$row["Name"].", ".$row["ID"]."</li>";
        }

        $connection = NULL;
    ?>

    </body>

</html>
