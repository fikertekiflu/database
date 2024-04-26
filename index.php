<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process form data when form is submitted
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

        // Prepare and bind parameters
        $stmt = $conn->prepare("INSERT INTO Member (Fname, Mname, Gender, Sdate, Edate) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fname, $mname, $gender, $sdate, $edate);

        // Set parameters and execute
        $fname = $_POST["fname"];
        $mname = $_POST["mname"];
        $gender = $_POST["gender"];
        $sdate = $_POST["sdate"];
        $edate = $_POST["edate"];

        if ($stmt->execute() === TRUE) {
            echo "New member inserted successfully";
        } else {
            echo "Error" . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
    ?>