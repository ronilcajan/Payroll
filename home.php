<?php require 'server/server.php'; ?>
<?php require 'model/check_auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'templates/header.php'; ?>
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Home · Onlineinsure Payroll System</title>
</head>
<body>
    <?php include 'templates/navbar.php'; ?>
    <div class="container">
        <div class="wrapper text-center">
            <h1>Welcome back, <?php echo empty($_SESSION['username']) ? 'User' : ucfirst($_SESSION['username']);?>!</h1>
            <img src="assets/images/ops.png" alt="Logo" width="500">
        </div>
            
    </div>
</body>
<?php require 'templates/footer.php'; ?>
</html>