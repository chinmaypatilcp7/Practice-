<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve credentials from the form
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Your database connection code goes here
    $servername = "your_server_name";
    $username_db = "your_db_username";
    $password_db = "your_db_password";
    $dbname = "your_database_name";

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to check credentials
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // If credentials are correct, redirect to another page
    if ($result->num_rows > 0) {
        header("Location: another_page.html");
        exit();
    } else {
        // If credentials are incorrect, you may handle it accordingly (e.g., display an error message)
        echo "Invalid credentials. Please try again.";
    }

    // Close the database connection
    $conn->close();
}
?>
