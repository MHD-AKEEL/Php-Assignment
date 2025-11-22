<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output Invoice</title>
</head>

<body>
    <?php
    // Item Prices
    $items = [
        "ABC-001" => ["name" => "Yoghurt", "unit_price" => 400],
        "ABC-002" => ["name" => "Milk", "unit_price" => 1300],
        "ABC-003" => ["name" => "Butter", "unit_price" => 240]
    ];

    // Function input
    function filter($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Check if form is submited
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $shop_name = filter($_POST['name']);
        $address = filter($_POST['address']);
        $contact = filter($_POST['contact_number']);
        $email = filter($_POST['email']);

        $quantities = ["ABC-001" => isset($_POST['qty_ABC001']) ? (int)$_POST['qty_ABC001'] : 0,
        "ABC-002" => isset($_POST['qty_ABC002']) ? (int)$_POST['qty_ABC002'] : 0,
        "ABC-003" => isset($_POST['qty_ABC003']) ? (int)$_POST['qty_ABC003'] : 0 ];

        // Discount calculation
        function calculate_discount($quantity, $unit_price) {
            $discount = 0;
            $text = "-";

            if ($quantity > 50) {
                $free_items = floor($quantity / 30) * 5;
                $discount = $free_items * $unit_price;
                $text = $free_items . "items free";
            }
            elseif ($quantity > 20) {
                $discount = $quantity * $unit_price * 0.10;
                $text = "10%";
            }
            elseif ($quantity > 10) {
                $discount = $quantity * $unit_price * 0.02;
                $text = "2%";
            }
            return ['amount' => $discount, 'text' => $text];
        }

        // Calculate Total
        $subtotal = 0;
        $total_discount = 0;
        $invoice_items = [];

        foreach ($quantities as $code => $qty) {
            if ($qty > 0) {
                $unit_price = $items[$code]['unit_price'];
                $total_price = $qty * $unit_price;

                $discount_info = calculate_discount($qty, $unit_price);
                $discount = $discount_info['amount'];
                $net_total = $total_price - $discount;

                $invoice_items[] = ['code' => $code, 'name' => $items[$code]['name'], 'quantity' => $qty, 
                'unit_price' => $unit_price, 'total_price' => $total_price, 'discount' => $discount, 
                'discount_text' => $discount_info['text'], 'net_total' => $net_total];

                $subtotal += $total_price;
                $total_discount += $discount;
            }
        }

        $final_total = $subtotal - $total_discount;

        // Display Invoice
        echo "<h1>Invoice - $shop_name</h1>";
        echo "<p><strong>Address: </strong> $address</p>";
        echo "<p><strong>Contact: </strong> $contact</p>";
        echo "<p><strong>Email: </strong> $email</p>";

        echo "<table border = '1' cellpadding = '5' cellspacing = '0'>";
        echo "<tr>
        <th> Item Code </th>
        <th> Item Name </th>
        <th> Quantity </th>
        <th> Unit Price (Rs) </th>
        <th> Tatal Price (Rs) </th>
        <th> Discount </th>
        <th> Net Price </th>
        </tr>";

        foreach ($invoice_items as $item) {
            echo "<tr>
            <td> {$item['code']} <td>
            <td> {$item['name']} </td>
            <td> {$item['quantity']} </td>
            <td> {$item['unit_price']} </td>
            <td> {$item['total_price']} </td>
            <td> {$item['discount_text']} </td>
            <td> {$item['net_total']} </td>
            </tr>";
        }

         echo "<tr>
            <td colspan='6' style='text-align:right'><strong>Total Discount</strong></td>
            <td><strong>$total_discount</strong></td>
          </tr>";

    echo "<tr>
            <td colspan='6' style='text-align:right'><strong>Final Total</strong></td>
            <td><strong>$final_total</strong></td>
          </tr>";

    echo "</table>";
    echo "<br><a href='shop_invoice.php'>Create New Invoice</a>";

    }
    ?>
</body>

</html>