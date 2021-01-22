<?php require 'server/server.php'; ?>
<?php require 'model/check_auth.php'; ?>
<?php require 'model/fetch_profile.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'templates/header.php'; ?>
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>My Profile · Onlineinsure Payroll System</title>
</head>
<body>
    <?php include 'templates/navbar.php'; ?>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="salesrep.php">Salesrep</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Salesrep</li>
            </ol>
        </nav>
        <div class="">
            <div class="card shadow-sm">
                <div class="card-body row">
                    <div class="col-sm-3">
                        <img class="img-thumbnail" src="assets/images/profile.png" />
                    </div>
                    <div class="col-sm-8">
                    <?php if(isset($_GET['edit']) && isset($_GET['id'])){ ?> 
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
                                    <form method="POST" id="profile-edit-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control name w-50" name="name" placeholder="Enter Fullname" value="<?php echo $name;?>" required/>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3 w-50">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">%</span>
                                            </div>
                                            <input type="number" min="0" placeholder="0" class="form-control comission text-right" name="comission" value="<?php echo $comission;?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3 w-50">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">%</span>
                                            </div>
                                            <input type="number" min="0" placeholder="0" class="form-control tax w-50 text-right" name="tax" value="<?php echo $tax;?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3 w-50">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">$</span>
                                            </div>
                                            <input type="number" min="0" placeholder="0" class="form-control bonus w-50 text-right" name="bonus" value="<?php echo $bonus;?>" required/>
                                        </div>
                                    </div>
                                    <input type="hidden" value="<?php echo $_GET['id'];?>" name="id"/>
                                    </form>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <div class="form-group row">
                                <label for="name" class="font-weight-bold pr-2">Name:</label>
                                <p id="name"><?php echo $name;?></p>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="font-weight-bold pr-2">Comission:</label>
                                <p id="name"><?php echo $comission.' %';?></p>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="font-weight-bold pr-2">Tax:</label>
                                <p id="name"><?php echo $tax.' %';?></p>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="font-weight-bold pr-2">Bonus:</label>
                                <p id="bonus"><?php echo $bonus.' $';?></p>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-sm-1 text-right">
                        <?php if(isset($_GET['id']) && isset($_GET['edit'])){ ?>
                            <a class="nav-link text-primary save-profile" href="#" type="button" title="Submit"><i class="nav-icon fas fa-paper-plane"></i></a>
                        <?php }else {?> 
                            <a class="nav-link text-success" href="?id=<?php echo $id; ?>&&edit" title="Edit Profile"><i class="nav-icon fas fa-edit"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require 'templates/footer.php'; ?>
</html>