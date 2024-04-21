<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Credit Balances</title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>

<h2>User Credit Balances on December 31, 2022</h2>
<table>
    <thead>
        <tr>
            <th>User ID</th>
            <th>Total Balance</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Your database connection code here
        $servername = "your_servername";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_dbname";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to retrieve user credit balances on December 31, 2023
        $sql = "SELECT user_id, SUM(balance) AS total_balance
                FROM credits
                WHERE DATE(created_datetime) = '2023-12-31'
                GROUP BY user_id";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["user_id"]. "</td><td>" . $row["total_balance"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No results found</td></tr>";
        }
        $conn->close();
        ?>
    </tbody>
</table>

</body>
</html>
