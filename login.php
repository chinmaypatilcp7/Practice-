<?php
// Database connection parameters
$servername = "your_server_name";
$username_db = "your_db_username";
$password_db = "your_db_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve data from the form
    $newUsername = $_POST["new_username"];
    $newPassword = $_POST["new_password"];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $newUsername, $newPassword);

    // Execute the query
    $stmt->execute();

    // Close the prepared statement
    $stmt->close();

    // Optionally, you can check if the insertion was successful
    if ($conn->affected_rows > 0) {
        echo "Record inserted successfully.";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
