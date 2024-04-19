<?php
require_once 'app/models/OrderModel.php';
class CartController
{
    private $orderModel;
    private $productModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
        $this->orderModel = new OrderModel($this->db);
    }


    public function updateQuality($id)
    {
        if(empty($_SESSION['username'])) {
            include_once 'app/views/account/login.php';
            exit;
        }
        $newQuantity = $_POST['quality'];
        foreach ($_SESSION['cart'] as &$item) {
            if ($item->id == $id) {
                $item->quantity = $newQuantity;

                break;
            }
        }
        header('Location: /chieu21/cart/show');
    }

    public function Add($id)
    {
        if(empty($_SESSION['username'])) {
            include_once 'app/views/account/login.php';
            exit;
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $product = $this->productModel->getProductById($id);
        if ($product) {
            $productExist = false;
            foreach ($_SESSION['cart'] as &$item) {
                if ($item->id == $id) {
                    $item->quantity++;
                    $productExist = true;
                    break;
                }
            }
            if (!$productExist) {
                $product->quantity = 1;
                $_SESSION['cart'][] = $product;
            }

            header('Location: /chieu21');
        } else {
            echo "Không tìm thấy sản phẩm với ID này!";
        }
    }

    public function remove($id)
    {
        if(empty($_SESSION['username'])) {
            include_once 'app/views/account/login.php';
            exit;
        }
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item->id == $id) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }

        header('Location: /chieu21/cart/show');
    }
    function show()
    {
        if(empty($_SESSION['username'])) {
            include_once 'app/views/account/login.php';
            exit;
        }
        include_once 'app/views/cart/index.php';
    }
    public function checkout()
    {
        if(empty($_SESSION['username'])) {
            include_once 'app/views/account/login.php';
            exit;
        }
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "Giỏ hàng trống!";
            return;
        }
        include_once 'app/views/cart/checkout.php';
    }
    public function processCheckout()
    {
        if(empty($_SESSION['username'])) {
            include_once 'app/views/account/login.php';
            exit;
        }
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "Giỏ hàng trống!";
            return;
        }
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $username = $_SESSION['username'];
        $orderID = $this->orderModel->createOrder($name, $phone, $address, $email,$_SESSION['cart'],$username);

        if ($orderID !== false) {
            foreach ($_SESSION['cart'] as $item) {
                $this->orderModel->insertOrderDetails($orderID, $item->id, $item->quantity);
            }
            include_once 'app/views/cart/thankyou.php';
            $_SESSION['cart'] = [];
        } else {
            echo "Failed to process the order. Please try again.";
        }
    }
    public function showOrders() {
        if(empty($_SESSION['username'])) {
            include_once 'app/views/account/login.php';
            exit;
        }
        $ordersData = [];
        if(empty($_SESSION['username'])) {
            include_once 'app/views/account/login.php';
            exit;
        }
        if ($_SESSION['role'] === 'admin') {
            $orders = $this->orderModel->getOrdersByRole('admin');
            foreach ($orders as $order) {
                $orderDetails = [
                    'id' => $order['id'],
                    'name' => $order['name'],
                    'phone' => $order['phone'],
                    'address' => $order['address'],
                    'email' => $order['email'],
                    'items' => []
                ];
                $orderItems = $this->orderModel->getOrderItems($order['id']);
                foreach ($orderItems as $item) {
                    $product = $this->productModel->getProductById($item['productID']);
                    $orderDetails['items'][] = [
                        'name' => $product->name,
                        'quantity' => $item['quantity']
                    ];
                }
                $ordersData[] = $orderDetails;
            }
        } else {
            $username = $_SESSION['username'];
            $orders = $this->orderModel->getOrdersByRole('user', $username);
            foreach ($orders as $order) {
                $orderDetails = [
                    'id' => $order['id'],
                    'name' => $order['name'],
                    'phone' => $order['phone'],
                    'address' => $order['address'],
                    'email' => $order['email'],
                    'items' => []
                ];
                $orderItems = $this->orderModel->getOrderItems($order['id']);
                foreach ($orderItems as $item) {
                    $product = $this->productModel->getProductById($item['productID']);
                    $orderDetails['items'][] = [
                        'name' => $product->name,
                        'quantity' => $item['quantity']
                    ];
                }
                $ordersData[] = $orderDetails;
            }
        }
        include_once 'app/views/account/orders.php';
        return $ordersData;
    }
}
