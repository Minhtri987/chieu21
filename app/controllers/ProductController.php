<?php
class ProductController
{

    private $productModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }

    public function listProducts()
    {
        if(empty($_SESSION['username'])) {
            include_once 'app/views/account/login.php';
            exit;
        }
        $stmt = $this->productModel->readAll();

        include_once 'app/views/product_list.php';
    }

    public function add()
    {
        if(empty($_SESSION['username'])) {
            include_once 'app/views/account/login.php';
            exit;
        }
        include_once 'app/views/product/add.php';
    }
    public function save()
    {
        if(empty($_SESSION['username'])) {
            include_once 'app/views/account/login.php';
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';

            if (isset($_POST['id'])) {
                $id = $_POST['id'];
            }

            // Check if a new image is uploaded
            if (!empty($_FILES["image"]['size'])) {
                $uploadResult = $this->uploadImage($_FILES["image"]);
            } else {
                // If no new image is uploaded, use the current image link from the input box
                $uploadResult = $_POST['imageLink'] ?? '';
            }

            if (!isset($id)) {
                $result = $this->productModel->createProduct($name, $description, $price, $uploadResult);
            } else {
                $result = $this->productModel->updateProduct($id, $name, $description, $price, $uploadResult);
            }

            if (is_array($result)) {
                $errors = $result;
                include 'app/views/product/add.php';
            } else {
                header('Location: /chieu21');
            }
        }
    }
    public function uploadImage($file)
    {
        if(empty($_SESSION['username'])) {
            include_once 'app/views/account/login.php';
            exit;
        }
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
        if ($file["size"] > 500000) { // Ví dụ: giới hạn 500KB
            $uploadOk = 0;
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            return false;
        } else {
            if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                return $targetFile;
            } else {
                return false;
            }
        }
    }


    public function edit($id)
    {
        if(empty($_SESSION['username'])) {
            include_once 'app/views/account/login.php';
            exit;
        }
        $product = $this->productModel->getProductById($id);
        if (empty($product)) {
            include_once 'app/views/share/not-found.php';
        } else {
            include_once 'app/views/product/edit.php';
        }
    }
    public function delete($id)
    {
        if(empty($_SESSION['username'])) {
            include_once 'app/views/account/login.php';
            exit;
        }
        $product = $this->productModel->getProductById($id);
        if (empty($product)) {
            include_once 'app/views/share/not-found.php';

        }
        $result = $this->productModel->deleteProduct($id);
        if ($result) {
            echo "<script>alert('Product deleted successfully !')</script>";
            header('Location: /chieu21');
        } else {
            $error = 'Failed to delete product';
            include_once 'app/views/product/edit.php';
        }
    }
}
