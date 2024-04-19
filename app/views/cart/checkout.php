<!-- Include the header -->
<?php include_once 'app/views/share/header.php'; ?>
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
<?php if (empty($_SESSION['cart'])) : ?>
    <p style="text-align: center;font-weight: bold;color: #8202de;">Giỏ hàng trống!</p>
<?php else : ?>
    <h2 style="text-align: center;font-weight: bold;color: #8202de;">Selected Products:</h2>
    <table style="margin: 0 auto; border: 1px solid #8202de; border-collapse: collapse;">
        <tr>
            <th style="border: 1px solid black;color: #8202de;">Name</th>
            <th style="border: 1px solid black;color: #8202de;">Quantity</th>
        </tr>
        <?php foreach ($_SESSION['cart'] as $item) : ?>
            <tr>
                <td style="border: 1px solid black;color: #8202de;"><?= $item->name ?></td>
                <td style="text-align: right; border: 1px solid black;color: #8202de;"><?= $item->quantity ?></td>
            </tr>
        <?php endforeach; ?>
    </table><br />
    <h2 style="text-align: center;font-weight: bold;color: #8202de;">Enter Your Information:</h2><br/>
    <div style="width: 18%; margin: 0 auto; border: 1px solid #000; padding: 10px;">
        <form action='/chieu21/cart/processCheckout' method='post' onsubmit="return validateForm()" style="text-align: center;">
            <div style="text-align: right;">
                <div>
                    <label for='name' style="font-weight: bold;color: #8202de;">Name:</label>
                    <input type='text' id='name' name='name' style="border-color: #f007dc">
                </div><br/>
                <div>
                    <label for='email' style="font-weight: bold;color: #8202de;">Email:</label>
                    <input type='text' id='email' name='email' style="border-color: #f007dc">
                </div><br/>
                <div>
                    <label for='phone' style="font-weight: bold;color: #8202de;">Phone Number:</label>
                    <input type='text' id='phone' name='phone' style="border-color: #f007dc">
                </div>
                <br/>
                <div>
                    <label for='address' style="font-weight: bold;color: #8202de;">Address:</label>
                    <input type='text' id='address' name='address' style="border-color: #f007dc">
                </div>
            </div>
            <input type='submit' value='Proceed Checkout' style="margin-top: 10px;background: linear-gradient(to bottom, #8202de, #f007dc);color:white;border-color: #f007dc">
        </form>
    </div>
<?php endif; ?>

<!-- Include the footer -->
<?php include_once 'app/views/share/footer.php'; ?>

<script>
    function validateForm() {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var address = document.getElementById('address').value;
        var errorMessage = '';

        if (name === '') {
            errorMessage += 'Name ';
        }
        if (email === '') {
            errorMessage += 'Email ';
        }
        if (phone === '') {
            errorMessage += 'Phone ';
        }
        if (address === '') {
            errorMessage += 'Address ';
        }
        errorMessage += 'must not be empty';
        if (name !== '' && email !== '' && phone !== '' && address !== '') errorMessage='';
        if (errorMessage !== '') {
            alert(errorMessage);
            return false;
        }
        return true;
    }
</script>