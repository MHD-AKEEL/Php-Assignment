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
    }
    ?>
</body>

</html>