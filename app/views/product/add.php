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
    <h2 style='font-weight: bold;color: #8202de;'>Add Product</h2><br/>
    <form class="user" action="/chieu21/product/save" method="post" enctype="multipart/form-data" style="max-width: 550px; margin: 0 auto;">
        <div class="row">
            <div class="col-md-12" style="font-weight: bold;font-size:20px;color: #8202de;">
                Product Name<textarea style="border-color: #f007dc" class="form-control" id="name" name="name" placeholder="Product Name"></textarea>
            </div>
        </div><br/><br/>
        <div class="row ">
            <div class="col-md-12" style="text-align: center;font-weight: bold;font-size:20px;color: #8202de;">
                Price<input style="text-align: center;border-color: #f007dc" type="number" class="form-control" id="price" name="price" placeholder="Product Price">
            </div>
        </div><br/><br/>
        <div class="row">
            <div class="col-md-12" style="text-align: center;font-weight: bold;font-size:20px;color: #8202de;">
                Description<textarea class="form-control" style="border-color: #f007dc" id="description" name="description" placeholder="Product Description" style="width: 100%;"></textarea>
            </div>
        </div><br/><br/>
        <div class="row">
            <div class="col-md-12" style="text-align: center; font-weight: bold; font-size: 20px;color: #8202de;">
                Image<input type="file" class="form-control" style="border-color: #f007dc" id="image" name="image">
            </div>
        </div><br/>
        <div class="row">
            <div class="col-md-12" style="text-align: center; font-weight: bold; font-size: 20px;color: #8202de;">
                Or Image Link<input type="text" style="border-color: #f007dc" class="form-control" id="imageLink" name="imageLink" placeholder="Product Image Link">
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
                    <button class="btn btn-primary" style="font-weight: bold;color: #8202de;background:white;border-color: #f007dc">Add</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include_once 'app/views/share/footer.php'; ?>