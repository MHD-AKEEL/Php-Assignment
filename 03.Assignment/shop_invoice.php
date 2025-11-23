<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop Invoice</title>
    <link rel="stylesheet" href="./shop.css">
</head>

<body>

    <form method="post" action="shop_joint.php">
        <table border="1" cellpadding="30" cellspacing="0">
            <tr>
                <td>
                    <div class="form-row">
                        <label>Shop Name:</label>
                        <input type="text" name="name"><br>
                    </div>

                    <div class="form-row">
                        <label>Address:</label>
                        <input type="text" name="address"><br>
                    </div>

                    <div class="form-row">
                        <label>Contact Number:</label>
                        <input type="text" name="contact_number"><br>
                    </div>

                    <div class="form-row">
                        <label>Email Address:</label>
                        <input type="text" name="email"><br>
                    </div>

                    <table border="0" cellpadding="20" cellspacing="0">
                        <tr>
                            <th>Item Code</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Unit Price (Rs)</th>
                        </tr>

                        <tr>
                            <td>ABC-001</td>
                            <td>Yoghurt</td>
                            <td><input type="number" name="qty_ABC001"></td>
                            <td>400.00</td>
                        </tr>

                        <tr>
                            <td>ABC-002</td>
                            <td>Milk</td>
                            <td><input type="number" name="qty_ABC002"></td>
                            <td>1380.00</td>
                        </tr>

                        <tr>
                            <td>ABC-003</td>
                            <td>Butter</td>
                            <td><input type="number" name="qty_ABC003"></td>
                            <td>240.00</td>
                        </tr>
                    </table><br>

                    <input type="submit" value="Submit">
                    <input type="reset" value="Clear">
                </td>
            </tr>
        </table>
    </form>

</body>

</html>