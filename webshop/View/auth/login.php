<?php
require(__DIR__ . '/../../../vendor/autoload.php');
include '../../Controller/user/loginController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Your Store</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Cart</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="loginEmail">Email</label>
                                <input type="email" class="form-control" name="email" id="loginEmail" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="loginPassword">Password</label>
                                <input type="password" class="form-control" name="password" id="loginPassword" placeholder="Password">
                            </div>
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once '../includes/footer.php';
?>