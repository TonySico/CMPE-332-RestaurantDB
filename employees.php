<!DOCTYPE html>

<head>
    <link href="basic.css" type="text/css" rel="stylesheet">
</head>

<html>

    <body>
       
	<center>
        <h1>Antho Knee's Restaurant<img src="clipart.png"></h1>
        <nav>
            <a href="restaurant.php">Order History</a> |
            <a href="addCustomer.php">Add New Customer</a> |
            <a href="checkOrders.php">All Orders</a> |
            <a class="active" href="employees.php">Employees</a>
        </nav>
    </center>
	<div class="center">
        
        <h2>List of employees</h2>
        <p>Select an employee to see the days they work.</p>
        <form action="processEmployee.php" method="post">
        <?php
            include 'connectDB.php';
            
            $result = $connection->query("select Name from Employee;"); 
            while ($row = $result->fetch()) {
                echo " <label for=\"Name\">".$row["Name"]."</label><input type=\"radio\" id=\"name\" name=\"Name\" value=\"".$row["Name"]."\"><br>";
            }
            
            $connection = NULL;
        ?>
        <br>
        <input type="submit">
    </div>
    </form>
    </body>

</html>
