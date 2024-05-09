<?php
$servername = "localhost";
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "rasheed";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];

// SQL to insert data into table
$sql = "INSERT INTO employee (id, name, age) VALUES ('$id', '$name', '$age')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  
  // Send email with data
  $to = "iabdulrasheeddudekula@gmail.com"; // Change to your Gmail address
  $subject = "New Person Added";
  $message = "A new person has been added with the following details:\n\nID: $id\nName: $name\nAge: $age";
  $headers = "From: your-email@gmail.com" . "\r\n" .
             "CC: another-email@example.com"; // Change if needed
  
  // Include PHPMailer library
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';
  
  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'iabdulrasheeddudekula@gmail.com'; // Your Gmail address
  $mail->Password = 'wwjf anbs jhlw gqkd'; // Your Gmail password
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  $mail->setFrom('iabdulrasheeddudekula@gmail.com'); // Your Gmail address
  $mail->addAddress($to);
  $mail->Subject = $subject;
  $mail->Body = $message;


  if ($mail->send()) {
      echo "<br>Email sent successfully";
  } else {
      echo "<br>Failed to send email";
  }
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
