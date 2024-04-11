<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <?php if(!isset($_SESSION['name'])) :?>
                <form action="logic.php" method="POST" class="shadow p-4 bg-light">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                    </div>
                    <button type="submit" class="btn btn-primary">Remember Me</button>
                </form>
                <?php else : ?>
                    <h3 class='text-center'>Welcome back <?= $_SESSION['name'];?></h3>
                    <form action="deleteSession.php" method="POST">
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
