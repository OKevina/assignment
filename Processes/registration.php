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
        echo "Registration successful. Data has been stored in the database.";
    } else {
        echo "Error during registration. Data was not stored in the database.";
    }
}
?>
