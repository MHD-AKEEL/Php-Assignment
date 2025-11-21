<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Output</title>
</head>

<body>
    <?php
    // Item Prices
    $prices = [
        "biscuits" => 50,
        "noodles"  => 100,
        "bread"    => 40,
        "milk"     => 60,
        "eggs"     => 5,
        "dhal"     => 75
    ];

    // Filter function to sanitize inputs
    function input($name, $default = 0)
    {
        if (isset($_POST[$name]) && $_POST[$name] !== "") {
            $data = $_POST[$name];
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            if (is_numeric($data)) {
                return strpos($data, ".") !== false ? (float)$data : (int)$data;
            }
            return $default;
        }
        return $default;
    }

    // Input Variables
    $biscuits = input("biscuits");
    $noodles  = input("noodles");
    $bread    = input("bread");
    $milk     = input("milk");
    $eggs     = input("eggs");
    $dhal     = input("dhal");

    // Calculate Totals for each item
    $total_biscuits = $prices['biscuits'] * $biscuits;
    $total_noodles  = $prices['noodles'] * $noodles;
    $total_bread    = $prices['bread'] * $bread;
    $total_milk     = $prices['milk'] * $milk;
    $total_eggs     = $prices['eggs'] * $eggs;
    $total_dhal     = $prices['dhal'] * $dhal;

    // Calculate Overall Total
    $total = $total_biscuits + $total_noodles + $total_bread + $total_milk + $total_eggs + $total_dhal;

    // Display Bill
    echo "<h1>Your Total Bill</h1>";
    echo "<p>Total Bill: Rs $total</p>";
    echo "<br><a href='bill_form.php'>Go Back</a>";
    ?>
</body>

</html>