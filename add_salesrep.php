<?php require 'server/server.php'; ?>
<?php require 'model/check_auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'templates/header.php'; ?>
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Add New Sales Representative · Onlineinsure Payroll System</title>
</head>
<body>
    <?php include 'templates/navbar.php'; ?>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="salesrep.php">Salesrep</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add New Sales Representative</li>
            </ol>
        </nav>
        <div class="">
            <div class="card shadow-sm">
                <div class="card-body row">
                    <div class="col-sm-3">
                        <img class="img-thumbnail" src="assets/images/profile.png" />
                    </div>
                    <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="name" class="font-weight-bold pr-2 pt-2">Name:</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="font-weight-bold pr-2 pt-2">Comission:</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="font-weight-bold pr-2 pt-2">Tax:</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="font-weight-bold pr-2 pt-2">Bonus:</label>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <form method="POST" id="add-salesrep-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control name w-50" name="name" placeholder="Enter Fullname" required/>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3 w-50">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="nav-icon fas fa-percent"></i></span>
                                            </div>
                                            <input type="number" min="0" placeholder="0" class="form-control comission text-right" name="comission" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3 w-50">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="nav-icon fas fa-percent"></i></span>
                                            </div>
                                            <input type="number" min="0" placeholder="0" class="form-control tax w-50 text-right" name="tax" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3 w-50">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="nav-icon fas fa-dollar-sign"></i></span>
                                            </div>
                                            <input type="number" min="0" placeholder="0" class="form-control bonus w-50 text-right" name="bonus" required/>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                    </div>

                    <div class="col-sm-1 text-right">
                            <a class="nav-link text-primary add-salesrep" href="#" type="button" title="Submit"><i class="nav-icon fas fa-paper-plane"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require 'templates/footer.php'; ?>
</html>