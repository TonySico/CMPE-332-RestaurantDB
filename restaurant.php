<!DOCTYPE html>

<head>
    <link href="basic.css" type="text/css" rel="stylesheet">
</head>

<html>

    <body>
       
	<center>
        <h1>Antho Knee's Restaurant<img src="clipart.png"></h1>
        <nav>
            <a class="active" href="restaurant.php">Order History</a> |
            <a href="addCustomer.php">Add New Customer</a> |
            <a href="checkOrders.php">All Orders</a> |
            <a href="employees.php">Employees</a>
        </nav>
    </center>

	<div class="center">
	
        <form action="getOrders.php" method="post">
            <label for="date">Select a Date to see order details:</label>
            <input type="date" id="date" name="orderDate">
            <input type="submit">
        </form>
 
    </div>
    </body>

</html>
