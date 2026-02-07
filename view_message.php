<?php
$conn = new mysqli("localhost", "root", "", "portfolio_db");

// 2. ទាញទិន្នន័យពី Table contacts
$sql = "SELECT * FROM contacts ORDER BY created_at DESC";
$result = $conn->query($sql);

echo "<h2>List contacter</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1' style='width:100%; border-collapse: collapse;'>
            <tr style='background-color: #f2f2f2;'>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
            </tr>";
    
    // 3. បង្ហាញទិន្នន័យតាមជួរ
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["message"] . "</td>
                <td>" . $row["created_at"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "មិនទាន់មានសារនៅឡើយទេ។";
}

$conn->close();
?>