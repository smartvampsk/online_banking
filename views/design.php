<!DOCTYPE html>
<html lang="en">
<?php 
    if(session_id() == '' || !isset($_SESSION)) {
        session_start();
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?php echo $title; ?> </title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top cust-nav-sec">
        <a class="navbar-brand" href="home">
            <img class="rounded pr-2" src="../images/bank.png" height="50" alt="Logo"> Online Banking
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ml-4">
                <li class="nav-item">
                    <a class="nav-link" href="home"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="balance"> <i class="fas fa-dollar-sign"></i> Balance </a>
                </li>
                <li class="nav-item dropdown no-arrow dropdown-hover">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-toolbox"></i> Operations<i class="fas fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="deposit">Deposit</a>
                        <a class="dropdown-item" href="withdraw">Withdraw</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="transfer">Transfer</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="statement"> <i class="fas fa-file-invoice"></i> Statement </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="enquiry"> <i class="fas fa-question"></i> Enquiry </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about"> <i class="fas fa-info-circle"></i> About us </a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="text-dark pt-2 pl-4">
                    <b>
                        <?php 
                            if (isset($_SESSION['user'])) {
                                echo $_SESSION['user'];
                            }
                        ?>
                    </b>
                </li>
                <li class="nav-item dropdown no-arrow dropdown-hover">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle fa-fw" style="font-size: 20px;"></i><i class="fas fa-caret-down pt-2"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="statement">Statement</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="">Settings</a>
                        <a class="dropdown-item" href="">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    
    <div class="m-0 p-0">
        <div id="carouselExampleIndicators" class="carousel slide carousel-lg container-fluid cus-carousel px-0" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../images/banking1.jpg" class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../images/banking2.jpg" class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../images/banking3.jpg" class="d-block w-100 img-fluid" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <section class="container " id="wrapper">
        <div id="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="home">Online Banking</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?php echo $pagename; ?>
                    </li>
                </ol>
            </div>

            <main class="container-fluid">
                <?php echo $content; ?>
            </main>

        </div>
    </section>

    <footer class="pt-4 pb-4 bg-dark">
        <div class="container my-auto">
            <div class="copyright text-center text-white">
                <span>Copyright &copy; Online Banking, <?php echo '2019 - '.date('Y'); ?></span>
            </div>
        </div>
    </footer>
    <a class="scroll-to-top rounded-circle" href="#page-top"><i class="fas fa-angle-up"></i></a>



    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteCustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are ready to delete selected record.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="view">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <script src="../js/sb-admin.min.js"></script>

    <script src="../js/demo/datatables-demo.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-bar-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>