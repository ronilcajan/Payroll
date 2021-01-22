<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require 'templates/header.php'; ?>
        <title>Sign In · Onlineinsure Payroll System</title>
        <!-- Custom styles for this login -->
        <link href="assets/css/login.css" rel="stylesheet">
    </head>
    <body class="text-center bg-midnight-bloom">
        <?php include 'templates/loading_screen.php'; ?>
        <div class="text-center w-100">
            <form class="form-signin" method="POST" id="quickForm">
                <img class="mb-4" src="assets/images/ops.png" alt="Logo" width="290">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="h5 mb-3 font-weight-700">Payroll Software</h5>
                        <label for="inputText" class="sr-only">Username</label>
                        <input type="text" id="inputText" class="form-control username has-error" placeholder="Username" name="username" required autofocus>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" class="form-control password" placeholder="Password" name="password" required>
                        <button class="btn btn-lg btn-block mt-5 btn-secondary login" >Sign In</button>
                    </div>
                </div>
            </form>
        </div>
        <?php require 'templates/footer.php'; ?>
    </body>
</html>
    