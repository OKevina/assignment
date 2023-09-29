<?php
include 'Database.php';

$db = new Database();
$conn = $db->getConnection();

$sql = "SELECT * FROM users";
$stmt = $conn->query($sql);

if ($stmt) {
    echo "<h2>Registered Users</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Error reading data from the database.";
}
?>
