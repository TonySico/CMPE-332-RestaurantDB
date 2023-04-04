<!DOCTYPE html>

<head>
    <link href="basic.css" type="text/css" rel="stylesheet">
</head>

<html>

    <body>
       
	<center>
        <h1>Restaurant</h1>
        <nav>
            <a href="restaurant.php">Order History</a> |
            <a href="addCustomer.php">Add New Customer</a> |
            <a class="active" href="checkOrders.php">All Orders</a> |
            <a href="employees.php">Employees</a>
        </nav>
    </center>
	
	<br>
    <h2>Orders placed by Date:</h2>
    <table>
    <tr><th>Date</th><th>Number of orders</th></tr>
        <?php
            include 'connectDB.php';
            
            $result = $connection->query("select Distinct DateOrdered from orders order by DateOrdered;"); 
            while ($row = $result->fetch()) {
                $dates = $connection->query("select count(DateOrdered) from orders where DateOrdered = '".$row["DateOrdered"]."';");
                $date = $dates->fetch();    
                echo "<tr><td>".$row["DateOrdered"]."</td><td>".$date[0]."</td></tr>";
            }
            
            $connection = NULL;
        ?>

    </table>
    </body>

</html>
