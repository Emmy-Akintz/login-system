<?php 

if (isset($_POST['register'])) {

            // connect to the database
            $mysqli = mysqli_connect("localhost", "emmanuel", "test123", "login_system");

            // check for errors
            if ($mysqli)  {
                echo "connection was successful"; 
            }

            // prepare and bind the SQL statement
            $stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)"); $stmt->bind_param("sss", $username, $email, $password);

            // Get the form data
            $username = $_POST['username']; $email = $_POST['email']; $password = $_POST['password'];

            // Hash the password
            $password = password_hash($password, PASSWORD_DEFAULT);
            // $password = ['password'];

            // Execute the SQL statement
            if ($stmt->execute()) { echo "New account created successfully!"; } else { echo "Error: " . $stmt->error; }

            // Close the connection
            $stmt->close(); $mysqli->close(); }
?>

<!DOCTYPE html>

<html>
    <body>

        

        <form action="register.php" method="post">
            <label for="username">Username: </label>
            <input id="username" name="username" required="" type="text" />
            <label for="email"> Email: </label>
            <input for="email" name="email" required="" type="email" />
            <label for="password">Password: </label>
            <input id="password" name="password" required="" type="password" />
            <input name="register" type="submit" value="Register" />
        </form>

    </body>
</html>