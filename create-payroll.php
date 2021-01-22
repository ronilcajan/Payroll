<?php require 'server/server.php'; ?>
<?php require 'model/check_auth.php'; ?>
<?php require 'model/fetch_salesrep.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'templates/header.php'; ?>
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Create Payroll · Onlineinsure Payroll System</title>
</head>
<body>
    <?php include 'templates/navbar.php'; ?>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Payroll</li>
            </ol>
        </nav>
        <div class="">
            <div class="card shadow-sm">
                <form method="POST" action="model/create_payroll.php" target="_blank">
                <div class="card-body">
                    <div class="row col-sm-12">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="salesrep">Salesrep</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="nav-icon fas fa-user"></i></span>
                                    </div>
                                    <select class="form-control salesrep" name="salesrep" required name="salesrep">
                                        <option disabled selected value="">Select Salesrep</option>
                                        <?php foreach($data as $row): ?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="salesrep">Date Period</label>
                                <div class="row">
                                    <div class="col-sm-4 pr-0">
                                        <select name="month" class="form-control mr-1" id="month-dropdown" name="month" required>
                                            <option disabled selected value="">Month</option>
                                            <?php
                                                foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $monthNumber => $month) {
                                                    echo "<option value='$monthNumber'>{$month}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 pr-0">
                                        <select class="form-control" id="week-dropdown" name="week" required>
                                            <option disabled selected value="">Week</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="year-dropdown" name="year" required>
                                            <option disabled selected value="">Year</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="salesrep">Bonus</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="nav-icon fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="text" class="form-control bonus" id="bonus" name="bonus" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="salesrep">Number of Clients</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="nav-icon fas fa-user"></i></span>
                                    </div>
                                    <input type="number" min="1" class="form-control" id="no_clients" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row cont-div mt-5">
                        <div class="col-sm-2"></div>
                         <div class="col-sm-8" id="clients-container">
                            

                            </div>               
                         </div>
                         <div class="col-sm-2"></div>            
                    </div>
                    <div class="col-sm-12 text-center mt-5 mb-5 create-pay" style="display:none;">
                        <button class="btn btn-danger" type="submit">Create Payroll</button>
                    </div>   
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php require 'templates/footer.php'; ?>
</html>