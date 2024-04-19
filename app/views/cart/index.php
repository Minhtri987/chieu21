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
<?php
include_once 'app/views/share/header.php';
// Kiểm tra xem session cart có tồn tại không
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<div class='container mt-5 text-center'>"; // Added text-center class
    echo "<h2 style='font-weight: bold;color: #8202de;'>Giỏ hàng trống!</h2>"; // Centered message
    echo "<br>";
    echo "<a href='/chieu21' class='btn btn-primary' >Go to Home</a>";
    echo "</div>";
} else {
    // Hiển thị danh sách sản phẩm trong giỏ hàng
    echo "<div class='container mt-5'>";
    echo "<h2 class='mb-4' style='font-weight: bold;color: #8202de;'>Danh sách giỏ hàng</h2>";
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col' style='color: #8202de'>ID</th>";
    echo "<th scope='col' style='color: #8202de'>Tên sản phẩm</th>";
    echo "<th scope='col' style='color: #8202de'>Số lượng</th>";
    echo "<th scope='col' style='color: #8202de'>Giá</th>";
    echo "<th scope='col' style='color: #8202de'>Tác vụ</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    $formattedPrices = [];
    $totalPrice = 0;
    foreach ($_SESSION['cart'] as $item) {
        $totalPrice += $item->quantity * $item->price;
        $formattedPrice = number_format($item->price * $item->quantity / 1000, 0, '.', '.') . ' K';
        $formattedPrices[] = $formattedPrice;
    }
    $formattedTotalPrice = number_format($totalPrice / 1000, 0, '.', '.') . ' Nghìn đồng';
    $index = 0;
    foreach ($_SESSION['cart'] as $item) {
        echo "<tr>";
        echo "<td style='color: #8202de'>$item->id</td>";
        echo "<td style='max-width: 400px; overflow: hidden; text-overflow: ellipsis;color: #8202de'>$item->name</td>";
        echo "<td>";
        echo "<li>
                <form method='post' action='/chieu21/cart/updateQuality/$item->id' >
                <style>li { list-style-type: none; }</style>
                <button type='button' style='border-color:#8202de;color:#f007dc' onclick='this.form.quality.value--;if(this.form.quality.value<1)this.form.quality.value=1;this.form.submit()'>-</button>
                <input name='quality' type='number' style='text-align:center;max-width: 150px;color: #8202de;border-color:#8202de' value=".$item->quantity." readonly/>
                <button type='button' style='border-color:#8202de;color:#f007dc' onclick='this.form.quality.value++;this.form.submit()'>+</button>
            </form>
            </li>";
        echo "</td>";
        echo "<td style='text-align: right;color:#8202de'>";
        if (isset($formattedPrices[$index])) {
            echo $formattedPrices[$index];
            $index+=1;
        }
        echo "</td>";
        echo "<td>";
        echo "<form method='post' action='/chieu21/cart/remove/$item->id'>";
        echo "<input type='submit' style='border-color:#8202de;color:#f007dc;background: white' value='Xóa' class='btn mt-2' onclick=\"return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')\" />";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

    // Hiển thị tổng tiền
    echo "<p class='lead' style='color:#8202de'>Tổng tiền: <span class='font-weight-bold'>" . $formattedTotalPrice . "</span></p>";
    // Hiển thị nút Checkout
    echo "<form action='/chieu21/cart/checkout' method='post'>";
    echo "<div style='display: flex; justify-content: space-between;'>
        <a href='/chieu21' class='btn btn-primary' style='font-weight: bold;color: #f007dc;background:white;border-color: #8202de' >Go to Home</a>
        <button type='submit' class='btn btn-primary' style='font-weight: bold;color: #8202de;background:white;border-color: #f007dc'>Checkout</button></div>";
    echo "</form>";
    echo "</div>";
}

include_once 'app/views/share/footer.php';
?>
