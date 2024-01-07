<?php
    // Connect to the database
    $connection = new mysqli("localhost", "username", "password", "database_name");

    // Check the connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // SQL query to fetch all the products
    $sql = "SELECT * FROM products";
    $result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Products</title>
    </head>
    <body>
        <h2>View Products</h2>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["product_name"] . "</td>";
                            echo "<td>" . $row["product_price"] . "</td>";
                            echo "<td>" . $row["product_description"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No products found</td></tr>";
                    }
                    $connection->close();
                ?>
            </tbody>
        </table>
    </body>
</html>