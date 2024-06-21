<?php
$hostname = 'register';
$username = 'register';
$password = 1239870;
$database = 'register';
$connection = mysqli_connect($hostname, $username, $password, $database);
$sql = "SELECT employee_name, DAYNAME(order_date) AS day, COUNT(*) AS order_count FROM orders GROUP BY employee_name, DAYNAME(order_date)";
$result = mysqli_query($connection, $sql);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Замовлення за працівниками і днями тижня</title>
</head>
<body>
<h1>Замовлення за працівниками і днями тижня</h1>
<table>
    <tr>
        <th>Працівник</th>
        <th>День тижня</th>
        <th>Кількість замовлень</th>
    </tr>
    <?php
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['employee_name']."</td>";
        echo "<td>".$row['day']."</td>";
        echo "<td>".$row['order_count']."</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
