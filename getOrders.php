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


    <div class="results">
    <table>
        <?php
            $date = $_POST["orderDate"];
            echo "<h2>Showing orders for: ".$date."</h2>";

            include 'connectDB.php';
            echo "<br>";

            //run a query
            $result = $connection->query("select customers.FName, customers.LName, itemsordered.FoodItem, Food.Price, Orders.total, Orders.tip, Orders.OrderID, employee.Name from ((((orders join employee on orders.DeliveryID = employee.ID) join itemsordered on orders.OrderID = itemsordered.OrderID) join customers on orders.EmailAddress = customers.EmailAddress) join Food on ItemsOrdered.IURL = Food.URL and ItemsOrdered.FoodItem = Food.FoodItemN)  where orders.DateOrdered = '".$date."'");

            //process results
            echo "<table><tr><th>Customer First Name</th><th>Customer Last Name</th><th>Food Item Ordered</th><th>Total($)</th><th>Tip($)</th><th>Employee Name</th></tr>";
            $prevOrderID = 0;
            $check = 0; 
            while ($row = $result->fetch()) {
            
                $num = $connection->query("select count(itemsordered.FoodItem) from (orders join itemsordered on orders.OrderID = itemsordered.OrderID) where orders.OrderId = '".$row["OrderID"]."';");
                $numItems = $num->fetch();
                
                if ($numItems[0] == 1){
                    echo "<tr><td>".$row["FName"]."</td><td>".$row["LName"]."</td><td>".$row["FoodItem"]." ($".$row["Price"].")</td><td>".$row["total"]."</td><td>".$row["tip"]."</td><td>".$row["Name"]."</td></tr>";
                } else {  
                    if ($check == $numItems[0]-1) {
                        echo $row["FoodItem"]." $(".$row["Price"].")<br></td><td>".$prevTotal."</td><td>".$prevTip."</td><td>".$prevDeliveryName."</td></tr>";
                        $check = 0;
                    } else if ($prevOrderID > $row["OrderID"] || $prevOrderID < $row["OrderID"]) {
                        echo "<tr><td>".$row["FName"]."</td><td>".$row["LName"]."</td><td>".$row["FoodItem"]." ($".$row["Price"].")<br>";
                        $check++;
                    } else {
                        echo $row["FoodItem"]." $(".$row["Price"].")<br>";
                        $check++;
                    }
                } 
            
                $prevTotal = $row["total"];
                $prevTip = $row["tip"];
                $prevDeliveryName = $row["Name"];
                $prevOrderID = $row["OrderID"];
            }
            echo "</table>";
            $connection = NULL;
        ?>
    </div>
    </body>

</html>
