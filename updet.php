<?php
// Connect to your database here (replace with your connection details)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentsinfo";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['member_id'])) {
    // Retrieve com_id from the $_POST array
    $member_id = $_POST['member_id'];
}
$fname = mysqli_real_escape_string($conn, $_POST['fname']);  
$mname = mysqli_real_escape_string($conn, $_POST['mname']);  
$gender = mysqli_real_escape_string($conn, $_POST['gender']);  
$sdate = mysqli_real_escape_string($conn, $_POST['sdate']);  
$edate = mysqli_real_escape_string($conn, $_POST['edate']);  


$check_sql = "SELECT * FROM Member WHERE Member_id = $member_id";
$result = mysqli_query($conn, $check_sql);

if (mysqli_num_rows($result) > 0) {
  
  $update_fields = "";
  if ($fname != "") {
    $update_fields .= "Fname='$fname', ";
  }
  if ($mname != "") {
    $update_fields .= "Mname='$mname', ";
  }
  if ($gender != "") {
    $update_fields .= "Gender='$gender', ";
  }
  if ($sdate != "") {
    $update_fields .= "Sdate='$sdate', ";
  }
  if ($edate != "") {
    $update_fields .= "Edate='$edate', ";
  }

  
  $update_fields = rtrim($update_fields, ", ");

  
  $sql = "UPDATE Member SET $update_fields WHERE Member_id=$member_id";

  if (mysqli_query($conn, $sql)) {
    echo "Member information updated successfully!";
  } else {
    echo "Error updating member information: " . mysqli_error($conn);
  }
} else {
 
  echo "You have to choose a valid ID!";
}

mysqli_close($conn);
?>