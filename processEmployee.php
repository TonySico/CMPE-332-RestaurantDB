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
            <a href="checkOrders.php">All Orders</a> |
            <a class="active" href="employees.php">Employees</a>
        </nav>
    </center>
	
	<br>
    
    <form action="employees.php" method="post">
    <?php
        include 'connectDB.php';
        $name = $_POST["Name"];
        

        echo "<h2>".$name."'s schedule:</h2>";

        $result = $connection->query("select Days from Employee join schedule on employee.ID = schedule.EmpID where employee.Name = '".$name."';");
        $check = $result->fetch();   

        if (!$check){
            echo "<p>This employee is not scheduled to work.</p>";
        } else {
            $result = $connection->query("select Days from Employee join schedule on employee.ID = schedule.EmpID where employee.Name = '".$name."';");
        }

        while ($row = $result->fetch()){
            echo $row["Days"]."<br>";
        } 
        
        $connection = NULL;
    ?>
    <br>
    <input type="submit" value="Reset">
    </form>
    </body>

</html>
