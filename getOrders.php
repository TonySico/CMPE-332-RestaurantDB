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
            <a href="addCustomer.php">Add New Customer</a> |
            <a href="checkOrders.php">All Orders</a> |
            <a href="employees.php">Employees</a>
        </nav>
    </center>
	
	<br>
	
	<form action="getOrders.php" method="post">
        <label for="date">Select a Date to see order details:</label>
		<input type="date" id="date" name="orderDate">
		<input type="submit">
	</form>

    <?php
        $date = $_POST["orderDate"];
        echo "<h2>Showing orders for: ".$date."</h2>";

        include 'connectDB.php';
        echo "<br>";

        //run a query
        $result = $connection->query("select customers.FName, customers.LName, itemsordered.FoodItem, Orders.total, Orders.tip, employee.Name from (((orders join employee on orders.DeliveryID = employee.ID) join itemsordered on orders.OrderID = itemsordered.OrderID) join customers on orders.EmailAddress = customers.EmailAddress) where orders.DateOrdered = '".$date."'");

        //process results
        echo "<table><tr><th>Customer First Name</th><th>Customer Last Name</th><th>Food Item Ordered</th><th>Total($)</th><th>Tip($)</th><th>Employee Name</th></tr>";

        while ($row = $result->fetch()) {
            echo "<tr><td>".$row["FName"]."</td><td>".$row["LName"]."</td><td>".$row["FoodItem"]."</td><td>".$row["total"]."</td><td>".$row["tip"]."</td><td>".$row["Name"]. "</tr>";
        }
        echo "</table>";
        $connection = NULL;
    ?>

    </body>

</html>
