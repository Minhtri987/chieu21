<?php include_once 'app/views/share/header.php'; ?>

<?php
if (isset($errors)) {
    echo "<ul>";
    foreach ($errors as $err) {
        echo "<li class='text-danger'>$err</li>";
    }
    echo "</ul>";
}
if (empty($_SESSION['username'])) {
    include_once 'app/views/account/login.php';
    exit;
}
?>

<div class="card-body p-5 text-center">
    <h2 style='font-weight: bold;color: #8202de;'>Edit Product</h2><br/>
    <form class="user" action="/chieu21/product/save" method="post" enctype="multipart/form-data" style="max-width: 550px; margin: 0 auto;">
        <input type="hidden" name="id" value="<?= $product->id ?>">
        <div class="row">
            <div class="col-md-12" style="font-weight: bold;font-size:20px;color: #8202de;">
                Product Name<textarea class="form-control" style="border-color: #f007dc" id="name" name="name" placeholder="Product Name"><?= $product->name ?></textarea>
            </div>
        </div><br/><br/>
        <div class="row ">
            <div class="col-md-12" style="text-align: center;font-weight: bold;font-size:20px;color: #8202de;">
                Price<input style="text-align: center;border-color: #f007dc" value="<?= $product->price ?>" type="number" class="form-control" id="price" name="price" placeholder="Product Price">
            </div>
        </div><br/><br/>
        <div class="row">
            <div class="col-md-12" style="text-align: center;font-weight: bold;font-size:20px;color: #8202de;">
                Description<textarea class="form-control" style="border-color: #f007dc" id="description" name="description" placeholder="Product Description" style="width: 100%;"><?= $product->description ?></textarea>
            </div>
        </div><br/><br/>
        <div class="row">
            <div class="col-md-12" style="text-align: center;font-weight: bold;font-size:20px;color: #8202de;">Image <br/>
                <?php
                if (empty($product->image)) {
                    echo "No Image!";
                } else {
                    if (strpos($product->image, 'http://') === 0 || strpos($product->image, 'https://') === 0) {
                        echo "<img src='" . $product->image . "'  style='width: 242px; height: auto;' alt=''  />";
                    } else {
                        echo "<img src='/chieu21/" . $product->image . "' alt='' />";
                    }
                }
                ?>
            </div>
        </div><br/>
        <div class="row">
            <div class="col-md-12">
                <input type="file" class="form-control" id="image" name="image" style="border-color: #f007dc">
            </div>
        </div><br/>
        <div class="row">
            <div class="col-md-12" style="text-align: center; font-weight: bold; font-size: 20px;color: #8202de;">
                Image Link<input value="<?= $product->image ?>" style="border-color: #f007dc" type="text" class="form-control" id="imageLink" name="imageLink" placeholder="Product Image Link">
            </div>
        </div><br/><br/>
        <div class="row">
            <div class="col-md-1">
                <div class="form-group">
                    <a href="/chieu21" class="btn btn-secondary" style="font-weight: bold;color: #f007dc;background:white;border-color: #8202de">Back</a>
                </div>
            </div>
            <div class="col-md-11">
                <div class="form-group text-right">
                    <button class="btn btn-primary" style="font-weight: bold;color: #8202de;background:white;border-color: #f007dc">Save Product</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include_once 'app/views/share/footer.php'; ?>