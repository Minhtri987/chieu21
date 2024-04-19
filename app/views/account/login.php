<?php include_once 'app/views/share/header.php'; ?>

<?php
if (isset($errors)) {
    echo "<ul>";
    foreach ($errors as $err) {
        echo "<li class='text-danger'>$err</li>";
    }
    echo "</ul>";
}
?>

<div class="card-body p-5 text-center">
    <h2 style="font-weight: bold;color: #8202de;">Login</h2><br/>
    <form class="user" action="/chieu21/account/checklogin" method="post" style="max-width: 550px;margin: 0 auto;">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" style="border-color: #8202de">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" style="border-color: #8202de">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-group text-center">
                    <div class="float-left">
                        <button class="btn btn-primary" style="font-weight: bold;color: #f007dc;background:white;border-color: #8202de">
                            Login
                        </button>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-warning" href="/chieu21/account/register" style="font-weight: bold;color: #8202de;background:white;border-color: #f007dc">Register</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include_once 'app/views/share/footer.php'; ?>