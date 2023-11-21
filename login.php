<?php  

if (isset($_POST['login'])) {   

//  Connect to the database
$mysqli = mysqli_connect("localhost", "emmanuel", "test123", "login_system");

// Check for errors
if ($mysqli)  {
    echo "connection was successful"; 
}

// Prepare and bind the SQL statement
$stmt = $mysqli->prepare("SELECT id, password FROM users WHERE username = ?");
 $stmt->bind_param("s", $username);

// Get the form data
$username = $_POST['username']; $password = $_POST['password'];

// Execute the SQL statement
$stmt->execute(); $stmt->store_result();

// Check if the user exists
if ($stmt->num_rows > 0) {

    // Bind the results to variables
    $stmt->bind_result($id, $hashed_password);

    // Fetch the result
    $stmt->fetch();

    // Verify the password
    if (password_verify($password, $hashed_password)) {

        // Set the session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;

        // Redirect to the user's dashbord
        // header("Location: dashboard.php"); 
        // exit;
        // } else { 
        //     echo "Incorrect password!"; 
        // } } else { 
        //     echo "User not found!"; 
        // }
        if ($_SESSION['loggedin']) {
            echo "Welcome!";
        } } else {
            echo "Incorrect password";
        }

        if ($_SESSION['username']) {
            echo "User found";
        } else {
            echo "User not found!";
        }

        // Close the connection
        $stmt->close(); $mysqli->close(); } else { echo ""; }
}
?>

<!DOCTYPE html>

<html>
    <body>
        

        <form action="login.php" method="post">
            <label for="username">Username: </label>
            <input id="username" name="username" required="" type="text" />
            <label for="password">Password: </label>
            <input id="password" name="password" required="" type="password" />
            <input name="login" type="submit" value="Login" />
        </form>

    </body>
</html>