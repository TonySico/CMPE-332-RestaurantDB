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
    
    <div class = "center">  
 
        <form action="employees.php" method="post">
        <?php
            include 'connectDB.php';
            $name = $_POST["Name"];
            

            echo "<h2>".$name."'s schedule:</h2>";

            $result = $connection->query("select Schedule.Days, Schedule.ShortDate, Schedule.StartTime, Schedule.EndTime from Employee join Schedule on Employee.ID = schedule.EmpID where employee.Name = '".$name."';");
            $check = $result->fetch();   

            if (!$check){
                echo "<p>This employee is not scheduled to work.</p>";
            } else {
                $result = $connection->query("select Schedule.Days, Schedule.ShortDate, Schedule.StartTime, Schedule.EndTime from Employee join Schedule on Employee.ID = schedule.EmpID where employee.Name = '".$name."' order by Days;");
            }
            
            echo "<table class=\"center2\"><tr><th>Date</th><th>Start Time</th><th>End Time</th></tr>";

            while ($row = $result->fetch()){
                if ($row["ShortDate"] == "Sat" || $row["ShortDate"] == "Sun") {
                } else {
                    echo "<tr><td>".$row["ShortDate"]." (".$row["Days"].")</td><td>".$row["StartTime"]."</td><td>".$row["EndTime"]."</td></tr>";
                }
            } 
            
        echo "</table><br><input type=\"submit\" value=\"Reset\">";
        
        $connection = NULL;
        ?>
    </div>
    </form>
    </body>

</html>
