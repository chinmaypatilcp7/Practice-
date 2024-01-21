<?php
// Assuming you have a database connection established

// Assume $username and $password are obtained from user input
$username = $_POST['username'];
$password = $_POST['password'];

// Query the database to verify credentials
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // User credentials are valid, open page1
    header("Location: page1.php");
    exit();
} else {
    // User credentials are invalid, open page2
    header("Location: page2.php");
    exit();
}
?>
