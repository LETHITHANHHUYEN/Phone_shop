<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../home.php");
}

$pdo = new PDO('mysql:host=localhost;dbname=didong', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['id'];
$statement = $pdo->prepare("SELECT pid, pname, cost, quantity, cid, description, image from product where pid=:id");
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="../css/admin.css">
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
        <div class="content">

            <form method="post" action="../action/edit.php">
                <div style="text-align: center;">
                    <h3>Edit details product</h3>
                </div>
                <center>
                    <?php foreach ($product as $pro) { ?>
                        <table>
                            <tr>
                                <td><b>Product name</b></td>
                                <td><input type="text" name="title" value="<?php echo $pro['pname']; ?>" style="width:560px" required></br></td>
                            </tr>
                            <tr>
                                <td><b>Cost</b></td>
                                <td><input type="text" name="cost" value="<?php echo $pro['cost']; ?>" style="width:560px" required></br></td>
                            </tr>
                            <tr>
                                <td><b>Quantity</b></td>
                                <td><input type="number" min="1" max="100" name="quantity" value="<?php echo $pro['quantity']; ?>" style="width:560px" required></td>
                            </tr>
                            <tr>
                                <td><b>Category</b></td>
                                <td>
                                    <select name="category" id="category" style="width:560px">
                                        <option value="1">Apple</option>
                                        <option value="2">Samsung</option>
                                        <option value="3">Oppo</option>
                                        <option value="4">Vivo</option>
                                        <option value="5">Other</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Image</b></td>
                                <td><input type="file" multiple accept="image/*" name="image" required></td>
                            </tr>
                            <tr>
                                <td><b>Description</b></td>
                                <td><textarea name="description" id="description" cols="75" rows="10"><?php echo $pro['description']; ?></textarea></td>
                            </tr>
                        </table>
                    <?php } ?>
                </center>
                <div style="text-align: right;">
                    <button type="submit" name="update">Update</button>
                </div>
            </form>

        </div>
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