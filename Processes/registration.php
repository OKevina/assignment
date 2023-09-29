<?php
include '../Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $db = new Database();
    $conn = $db->getConnection();

    $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        // Redirect to index.html upon successful registration
        header("Location: ../index.html");
        exit;
    } else {
        echo "Error during registration. Data was not stored in the database.";
    }
}
?>
