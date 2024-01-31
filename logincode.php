<?php

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // For simplicity, you can hardcode a username and password for the example
    $validUsername = "user123";
    $validPassword = "password123";

    // Check if the entered credentials match the valid credentials
    if ($username == $validUsername && $password == $validPassword) {
        // Successful login
        echo "Login successful!";
    } else {
        // Invalid credentials
        echo "Invalid username or password. Please try again.";
    }
}

?>
