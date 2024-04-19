<?php
include_once 'app/views/share/header.php';

if(isset($errors)){
    echo "<ul>";
    foreach($errors as $err){
        echo "<li class='text-danger'>$err</li>";
    }
    echo "</ul>";
}
if (empty($_SESSION['username'])) {
    include_once 'app/views/account/login.php';
    exit;
}

// Include the CartController class
require_once 'app/controllers/CartController.php';

// Create an instance of CartController
$cartController = new CartController();

// Call the showOrders method to get the orders data
$ordersData = $cartController->showOrders();
?>

    <style>
        table {
            margin-top: 20px;
            border: 1px solid #000;
            width: 100%;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #000;
        }
        h2 {
            text-align: center;
        }
    </style>

    <h2 style='font-weight: bold;color: #8202de;'>List of orders</h2>

    <table style="margin-left: 5px; max-width: 1800px;margin: 20px auto;">
        <tr>
            <th style="color: #8202de">Order ID</th>
            <th style="color: #8202de">Name</th>
            <th style="color: #8202de">Phone</th>
            <th style="color: #8202de">Address</th>
            <th style="color: #8202de">Email</th>
            <th style="color: #8202de">Ordered Items</th>
        </tr>
        <?php foreach ($ordersData as $order): ?>
            <tr>
                <td style="color: #8202de"><?php echo $order['id']; ?></td>
                <td style="color: #8202de"><?php echo $order['name']; ?></td>
                <td style="color: #8202de"><?php echo $order['phone']; ?></td>
                <td style="color: #8202de"><?php echo $order['address']; ?></td>
                <td style="color: #8202de"><?php echo $order['email']; ?></td>
                <td>
                    <ul>
                        <?php foreach ($order['items'] as $item): ?>
                            <li style="color: #8202de"><?php echo $item['name'] . " - " . $item['quantity']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php
include_once 'app/views/share/footer.php';
?>