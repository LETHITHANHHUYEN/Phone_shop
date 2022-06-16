<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../home.php");
}

include_once('../action/Dataprovider.php');
$sqlproduct = "select pid, pname, cost, quantity, cname, image from product join category on category.cid = product.cid";
if (isset($_REQUEST["cid"])) {
    $sqlproduct .= " WHERE product.cid = " . $_REQUEST["cid"];
}
$result = DataProvider::ExecuteQuery($sqlproduct);

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Di ĐỘNG VIỆT A</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="admin.php" class="nav-link">All products</a>
                </li>

            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="home.html" class="brand-link">
                <i class="fas fa-mobile"></i>
                <span class="brand-text font-weight-light"> DI ĐỘNG VIỆT A</span>
            </a>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">List</a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="addproduct.php" class="nav-link">
                                    <p>Add products</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="hotproduct.php" class="nav-link">
                                    <p>Hot products</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">ADMIN</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../account/logout.php">Log out</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <table class="table">
            <thead>
                <tr>
                    <th style="border-color:firebrick" scope=" col">Number</th>
                    <th style="border-color:firebrick" scope="col">Image</th>
                    <th style="border-color:firebrick" scope="col">Name</th>
                    <th style="border-color:firebrick" scope="col">Cost</th>
                    <th style="border-color:firebrick" scope="col">Quantity</th>
                    <th style="border-color:firebrick" scope="col">Category</th>
                    <th style="border-color:firebrick" scope="col">Actions</th>
                </tr>
            </thead>
            <?php
            while ($pro = $result->fetch()) {
                $cost = number_format($pro['cost']);
                $listproduct = <<< EOD
            <tbody>
                <tr>
                    <td style="border-color:firebrick">{$pro['pid']}</td>
                    <td style="border-color:firebrick"><img src="../img/{$pro['image']}" style="height: 120px;width: 120px;"></td>
                    <td style="border-color:firebrick">{$pro['pname']}</td>
                    <td style="border-color:firebrick">{$cost} đ</td>
                    <td style="border-color:firebrick">{$pro['quantity']}</td>
                    <td style="border-color:firebrick">{$pro['cname']}</td>
                    <td style="border-color:firebrick">
                        <form method="post" action="../action/addhotproduct.php" style="display: inline-block">
                            <input type="hidden" name="id" value="{$pro['pid']}"/>
                            <button type="submit">Add to hot products</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            EOD;
                echo $listproduct;
            }
            ?>
        </table>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2021 <a href="">LETHITHANHHUYEN</a>.</strong> All rights
        reserved.
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>