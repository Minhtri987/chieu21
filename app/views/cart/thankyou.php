<!-- thankyou.php -->
<?php
// Include the header
include_once 'app/views/share/header.php';
?>
<?php

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
?>
<h1 style="text-align: center;font-weight: bold;color: #8202de;">Thank you for choosing our shop</h1>

<!-- Display the list of selected products -->
<h2 style="text-align: center;font-weight: bold;color: #8202de;">Ordered Products:</h2>
<?php
foreach ($_SESSION['cart'] as $item) {
    echo "<p style='text-align: center;color: #f007dc;font-weight: bold'>{$item->name} - Quantity: {$item->quantity}</p>";
}
?>

<!-- Display the submitted name, phone number, and address -->
<div style="width: 50%; margin: 0 auto; border: 1px solid #000; padding: 10px;">
    <h2 style="text-align: center;font-weight: bold;color: #8202de;">Customer Information:</h2>
    <p style="color: #8202de;"><strong style="font-weight: bold;color: #8202de;">Name:</strong> <?php echo $_POST['name']; ?></p>
    <p style="color: #8202de;"><strong style="font-weight: bold;color: #8202de;">Phone Number:</strong> <?php echo $_POST['phone']; ?></p>
    <p style="color: #8202de;"><strong style="font-weight: bold;color: #8202de;">Address:</strong> <?php echo $_POST['address']; ?></p>
    <p style="color: #8202de;"><strong style="font-weight: bold;color: #8202de;">Email:</strong> <?php echo $_POST['email']; ?></p>
</div>

<!-- Go to home button -->
<div style="text-align: center; margin-top: 20px;">
    <a href="/chieu21" class="btn btn-outline-dark mt-auto" style="font-weight: bold;border-color:#f007dc; display: inline-block; padding: 10px 20px; background-color: white; color:#8202de; text-decoration: none;">Go to Home</a>
</div>

<?php
// Include the footer
include_once 'app/views/share/footer.php';
?>