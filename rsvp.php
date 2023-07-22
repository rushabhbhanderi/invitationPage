<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $attendees = $_POST["attendees"];
    $message = $_POST["message"];

    // TODO: Perform data validation and sanitization here

    // Database configuration (replace with your database credentials)
    $servername = "your_servername";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert RSVP data into the database
    $sql = "INSERT INTO rsvp_data (name, email, attendees, message) VALUES ('$name', '$email', '$attendees', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully
        echo "<h2>Thank you for RSVPing!</h2>";
        echo "<p>We look forward to seeing you at the event.</p>";
    } else {
        // Error occurred while inserting data
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
