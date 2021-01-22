<?php require 'server/server.php'; ?>
<?php require 'model/check_auth.php'; ?>
<?php require 'model/fetch_pdf.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'templates/header.php'; ?>
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Invoices · Onlineinsure Payroll System</title>
</head>
<body>
    <?php include 'templates/navbar.php'; ?>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="pdf.php">PDF</a></li>
                <li class="breadcrumb-item active" aria-current="page">Invoices</li>
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
                <div class="card-header"><a type="button" class="btn btn-sm btn-primary" href="create-payroll.php"><i class="nav-icon fas fa-plus"></i></a></div>
                <div class="card-body row">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Salesrep Name</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Files</th>
                                <th class="text-center">Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row): ?>
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td><a href="salesrep_profile.php?id=<?php echo $row['salesrep_id'];?>"><?php echo ucfirst($row['name']);?></a></td>
                                    <td class="text-center"><?php echo ucfirst($row['username']);?></td>
                                    <td class="text-center"><a href="pdf/<?php echo $row['filename'];?>" class="text-danger" target="_blank"><i class="nav-icon fas fa-file-pdf"></i></a></td>
                                    <td class="text-center"><?php echo date('M. d, Y',strtotime($row['date']));?></td>
                                    <td>
                                        <a href="model/delete_pdf.php?id=<?php echo $row['id'];?>" title="Delete Invoice" class="text-danger"><i class="nav-icon fas fa-trash"></i> </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Salesrep Name</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Files</th>
                                <th class="text-center">Date</th>
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