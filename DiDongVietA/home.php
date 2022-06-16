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
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!--style-->
    <link rel="stylesheet" href="css/form.css">

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
                    <a href="home.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a class="nav-link" href="#" onclick="document.getElementById('id01').style.display='block'" role="button">Login</a>
                        <div class="dropdown-divider"></div>
                        <a class="nav-link" href="#" onclick="document.getElementById('id02').style.display='block'" role="button">Sign Up</a>
                    </div>

                    <div id="id01" class="modal">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                        <!-- Modal Content -->
                        <form class="modal-content animate" method="post" action="./account/login.php">
                            <div class="imgcontainer">
                                <img src="./dist/img/img_avatar2.png" alt="Avatar" class="avatar">
                                <div>
                                    <h3>Login</h3>
                                </div>
                            </div>
                            <div class="container">
                                <label for="uname"><b>Username</b></label>
                                <input type="text" placeholder="Enter Username" name="username" required>

                                <label for="psw"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="password" required>

                                <button type="submit" name="login">Login</button>
                                <label>
                                    <input type="checkbox" checked="checked" name="remember"> Remember me
                            </div>

                            <div class="container" style="background-color:#f1f1f1">
                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                <span class="psw">Forgot <a href="#">password?</a></span>

                            </div>

                        </form>
                    </div>
                    <!-- The Modal (contains the Sign Up form) -->
                    <div id="id02" class="modal">
                        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                        <!-- Modal Content -->
                        <form name="form2" method="post" class="modal-content animate" action="./account/signup.php" onsubmit="return matchpass()">
                            <div class="imgcontainer">
                                <img src="./dist/img/img_avatar2.png" alt="Avatar" class="avatar">
                                <div>
                                    <h3>Sign Up</h3>
                                </div>
                            </div>
                            <div class="container">
                                <label for="uname"><b>Username</b></label>
                                <input type="text" placeholder="Enter Username" name="uname" required>

                                <label for="psw"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="psw" required>

                                <label for="psw-repeat"><b>Repeat Password</b></label>
                                <input type="password" placeholder="Repeat Password" name="pswrepeat" required>

                                <label for="eml"><b>Email</b></label>
                                <input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box;" type="email" placeholder="Enter email" name="eml" required>

                                <label>
                                    <input type="checkbox" checked="checked" name="remember"> Remember me
                                </label>
                                <div class="container" style="background-color:#f1f1f1">
                                    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                                    <button style="width:75%; height: 44px;" class="signupbtn" type="submit" name="signup">Sign
                                        Up</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
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
                                <a href="#" class="nav-link">
                                    <p>Apple</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <p>Samsung</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <p>Oppo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <p>Vivo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <p>Other</p>
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
                        <h1 class="m-0">Sale off</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active">Hot products</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

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
    <script type="text/javascript">
        function matchpass() {
            var firstpassword = document.form2.psw.value;
            var secondpassword = document.form2.pswrepeat.value;
            if (firstpassword == secondpassword) {
                return true;
            } else {
                alert("Password must be same!")
                return false;
            }
        }
    </script>
    <!-- Còn sai 
    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById('id02');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>