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
            <a class="active" href="addCustomer.php">Add New Customer</a> |
            <a href="checkOrders.php">All Orders</a> |
            <a href="employees.php">Employees</a>
        </nav>
    </center>
	<div class="center">
	
        <form action="addedCustomer.php" method="post">
            <p>Complete the below form to register a new account.</p>
            <label for="email">Enter your email</label>
            <input type="email" id="email" name="email" required placeholder="xxxxx@xxxxx.xxx">
            <br>
            <label for="email">Enter your first name</label>
            <input type="text" id="fname" name="fname" placeholder="Jane">
            <br>
            <label for="email">Enter your last name</label>
            <input type="text" id="lname" name="lname" placeholder="Doe">
            <br>
            <label for="email">Enter your phone number</label>
            <input type="tel" id="phone" name="phoneNumber" pattern="[0-9][3]-[0-9][3]-[0-9][4]" placeholder="613-613-6136">
            <br>
            <label for="email">Enter your postal code</label>
            <input type="text" id="postalCode" name="postalCode" pattern="[a-zA-Z][0-9][a-zA-Z]-[0-9][a-zA-Z][0-9]" placeholder="X1X-1X1">
            <br>
            <label for="email">Enter your street</label>
            <input type="text" id="street" name="street" placeholder="University Ave.">
            <br>
            <label for="email">Enter your city</label>
            <input type="text" id="city" name="city" placeholder="Kingsont">
            <input type="submit">
        </form>
    </div>

    </body>

</html>