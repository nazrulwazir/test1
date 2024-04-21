<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Order</title>
    <style>
        body {
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    label {
        display: block;
        margin-bottom: 10px;
    }
    input[type="number"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }
    button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    button:hover {
        background-color: #45a049;
    }
</style>
</head>

<body>
    <div class="container">
        <h2>Pizza Order</h2>
        <form action="" method="post">
            <label for="size">Select Pizza Size:</label>
            <select id="size" name="size">
                <option value="small">Small (RM15)</option>
                <option value="medium">Medium (RM22)</option>
                <option value="large">Large (RM30)</option>
            </select><br>
            <label for="pepperoni">Add Pepperoni:</label>
            <input type="checkbox" id="pepperoni" name="pepperoni"><br>
            <label for="extra_cheese">Add Extra Cheese:</label>
            <input type="checkbox" id="extra_cheese" name="extra_cheese"><br>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" value="1" required><br>
            <button type="submit" name="submit">Place Order</button>
        </form>
    </div>
    <?php
        // Define pizza prices
        $pizzaPrices = [
            'small' => 15,
            'medium' => 22,
            'large' => 30
        ];

        // Define additional toppings prices
        $toppingPrices = [
            'pepperoni' => [
                'small' => 3,
                'medium' => 5,
                'large' => 5
            ],
            'extra_cheese' => 6
        ];

        // Process form submission
        if (isset($_POST['submit'])) {
            // Get form data
            $size = $_POST['size'];
            $pepperoni = isset($_POST['pepperoni']);
            $extraCheese = isset($_POST['extra_cheese']);
            $quantity = intval($_POST['quantity']);

            // Calculate total price
            $totalPrice = $pizzaPrices[$size] * $quantity;

            if ($pepperoni) {
                $totalPrice += $toppingPrices['pepperoni'][$size] * $quantity;
            }

            if ($extraCheese) {
                $totalPrice += $toppingPrices['extra_cheese'] * $quantity;
            }

            // Display order details
            echo '<div class="container">';
            echo '<h2>Order Summary</h2>';
            echo '<p>Size: ' . ucfirst($size) . '</p>';
            if ($pepperoni) {
                echo '<p>Add Pepperoni: Yes</p>';
            } else {
                echo '<p>Add Pepperoni: No</p>';
            }
            if ($extraCheese) {
                echo '<p>Add Extra Cheese: Yes</p>';
            } else {
                echo '<p>Add Extra Cheese: No</p>';
            }
            echo '<p>Quantity: ' . $quantity . '</p>';
            echo '<p>Total Price: RM' . $totalPrice . '</p>';
            echo '</div>';
        }
    ?>
</body>

</html>