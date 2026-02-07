<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "portfolio_db";

$conn = new mysqli($host, $user, $pass, $db);

// ពិនិត្យមើលការភ្ជាប់
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. ចាប់យកទិន្នន័យពី Form
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // 3. បញ្ចូលទៅក្នុង Database
    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('សាររបស់អ្នកត្រូវបានផ្ញើ!'); window.location.href='index.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>