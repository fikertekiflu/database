<?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = ""; // Assuming no password is set
    $dbname = "studentsinfo";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $member_id = $_POST['member_id'];

        // Prepare and execute SQL statement
        $sql = "DELETE FROM Member WHERE Member_id = $member_id";

        if ($conn->query($sql) === TRUE) {
            echo "Member deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close connection
    $conn->close();
    ?>
