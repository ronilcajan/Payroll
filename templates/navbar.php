<div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#769fcd">
            <div class="container">
                <a class="navbar-brand" href="home.php">Onlineinsure Payroll System</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav w-100 d-flex justify-content-end" id="nav-container">
                        <li class="nav-item <?php echo strpos($_SERVER['REQUEST_URI'], 'home') ? 'active' : ''; ?>">
                            <a class="nav-link" href="home.php"><i class="nav-icon fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown <?php echo (strpos($_SERVER['REQUEST_URI'], 'profile') || strpos($_SERVER['REQUEST_URI'], 'salesrep')) ? 'active' : ''; ?>">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="nav-icon fas fa-user"></i> Salesrep
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="salesrep.php"><i class="nav-icon fas fa-user-circle"></i> Salesrep Profile</a>
                                <a class="dropdown-item" href="add_salesrep.php"><i class="nav-icon fas fa-user-plus"></i> Add Salesrep Profile</a>
                            </div>
                        </li>
                        <li class="nav-item <?php echo strpos($_SERVER['REQUEST_URI'], 'create') ? 'active' : ''; ?>">
                            <a class="nav-link" href="create-payroll.php"><i class="nav-icon fas fa-pen"></i> Create Payroll</a>
                        </li>
                        <li class="nav-item <?php echo strpos($_SERVER['REQUEST_URI'], 'pdf') ? 'active' : ''; ?>">
                            <a class="nav-link" href="pdf.php"><i class="nav-icon fas fa-file-pdf"></i> PDF's</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link logout" href="model/logout.php"><i class="nav-icon fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>