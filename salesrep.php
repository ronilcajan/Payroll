<?php require 'server/server.php'; ?>
<?php require 'model/check_auth.php'; ?>
<?php require 'model/fetch_salesrep.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'templates/header.php'; ?>
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Sales Representative · Onlineinsure Payroll System</title>
</head>
<body>
    <?php include 'templates/navbar.php'; ?>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="salesrep.php">Salesrep</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sales Representative</li>
            </ol>
        </nav>
        <div class="">
        <?php if(isset($_SESSION['msg'])) :?>
            <div class="alert alert-danger" role="alert">
                <i class="nav-icon fas fa-exclamation-circle"></i> <?php echo $_SESSION['msg']; ?>
            </div>
            <?php unset($_SESSION['msg']); ?>
        <?php endif ?>
            <div class="card shadow-sm">
                <div class="card-header"><a type="button" class="btn btn-sm btn-primary" href="add_salesrep.php"><i class="nav-icon fas fa-plus"></i></a></div>
                <div class="card-body row">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Salesrep Name</th>
                                <th class="text-center">Comission(%)</th>
                                <th class="text-center">Tax(%)</th>
                                <th class="text-center">Bonus($)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row): ?>
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td><a href="salesrep_profile.php?id=<?php echo $row['id'];?>"><?php echo ucfirst($row['name']);?></a></td>
                                    <td class="text-right"><?php echo $row['comission'].' %';?></td>
                                    <td class="text-right"><?php echo $row['tax'].' %';?></td>
                                    <td class="text-right"><?php echo '$ '.number_format($row['bonus'], 2);?></td>
                                    <td>
                                        <a href="salesrep_profile.php?id=<?php echo $row['id'];?>&&edit" title="Edit Information" class="text-success pr-2"><i class="nav-icon fas fa-pen"></i> </a> 
                                        <a href="model/delete_salesrep.php?id=<?php echo $row['id'];?>" title="Delete Salesrep" class="text-danger"><i class="nav-icon fas fa-trash"></i> </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Salesrep Name</th>
                                <th>Comission</th>
                                <th>Tax</th>
                                <th>Bonus</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require 'templates/footer.php'; ?>
</html>