<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $place = $_POST['place'];
    $gender = $_POST["gender"];
    $number = $_POST['number'];
    $age = $_POST["age"];

    // Database credentials
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'travellerdb';

    // Create a connection to the database
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert form data into the "contact" table
    $sql = "INSERT INTO users (name, email, place, gender, number, age) VALUES ('$name', '$email', '$place', '$gender', '$number', '$age')";
    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
