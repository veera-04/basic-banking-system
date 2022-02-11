<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Primo</title>
        <link rel="shortcut icon" href="./images/bank.png" type="image/x-icon">
        <!-- BootStrap -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
            integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
            crossorigin="anonymous"
        />

        <!-- CSS -->
        <link rel="stylesheet" href="styles/defaultStyles.css">
        <link rel="stylesheet" href="styles/home.css" />

        <!-- JS -->
        <script
            src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
            crossorigin="anonymous"
        ></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- FontAwesome -->
        <script
            src="https://kit.fontawesome.com/b024a0525a.js"
            crossorigin="anonymous"
        ></script>

        <!-- Alert -->
        <script>
            function success() {
                swal({
                    title: "Registration Completed!",
                    icon: "success",
                }).then(function() {
                window.location = "index.php";
                });
            }
            function error() {
                swal({
                    title: "OOPS!",
                    text: "Please check the details entered!",
                    icon: "error",
                }).then(function() {
                window.location = "index.php";
                });
            }
        </script>
    </head>

    <body>
        <div class="pageContent">

            <!-- Navbar -->
            <nav class="navbar fixed-top navbar-expand-lg">
                <a class="navbar-brand" href="#">Primo</a>
                <button
                    class="navbar-toggler custom-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon custom-toggler"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pages/customers.php">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pages/transaction.php">Credit Transfer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pages/transactionLog.php">Transaction Log</a>
                        </li>
                    </ul>
                </div>
            </nav>
    
            <!-- Home -->
    
            <section class="home">
                <div class="content">
                    <div class="row center">
                        <div class="col-lg-6">
                            <img class="banking-gif" src="images/banking.gif" alt="banking-gif"/>
                        </div>
                        <div class="col-lg-6">
                            <h1 class="bank-name">
                                Welcome to<br />Primo Bank Inc.
                            </h1>
                            <p class="heading-para">
                                An easy and simple way to transfer money in one
                                click.
                            </p>
                            <button type="button" class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#registration">
                                Join Now
                            </button>
    
                            <!-- Modal -->
                            <div class="modal fade" id="registration" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel">
                                                    Registration
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="First name" name="name"/>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="e-mail" name="email"/>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="City" name="city"/>
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Amount Deposited" name="amt"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    Register
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
            </section>
    
            <!-- Services -->
    
            <section class="services center">
                <h2 class="h2">Services</h2>
                <div class="row">
                    <div class="col-lg-4">
                        <a href="./pages/customers.php" class="card">
                            <div class="services-box">
                                <img src="images/customers-64.png" alt="" class="service-img"/><br />
                                <span class="text">Customers</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a class="card" href="./pages/transaction.php">
                            <div class="services-box">
                                <img src="images/transfer-64.png" alt="" class="service-img"/><br />
                                <span class="text">Credit Transfer</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="./pages/transactionLog.php" class="card">
                            <div class="services-box">
                                <img src="images/transaction-64.png" alt="" class="service-img"/><br />
                                <span class="text">Transaction Log</span>
                            </div>
                        </a>
                    </div>
                </div>
                <hr />
            </section>
        </div>

        <!-- Footer -->
        <footer class="center">
            <h4>Veera04 © 2022</h4>
            <div>
                <a class="account" href="https://github.com/veera-04/" target="_blank">
                    <i class="fab fa-github fa-2x acct"></i>
                </a>
                <a class="account" href="https://www.linkedin.com/in/veeramanikandan-s/" target="_blank" >
                    <i class="fab fa-linkedin-in fa-2x acct"></i>
                </a>
                <a class="account" href="https://www.instagram.com/vmk_4721/" target="_blank">
                    <i class="fab fa-instagram fa-2x acct"></i>
                </a>
                <a class="account" href="mailto:veera4721@gmail.com" target="_blank">
                    <i class="fas fa-envelope fa-2x acct"></i>
                </a>
                <a class="account" href="https://api.whatsapp.com/send?phone=+917708078386" target="_blank">
                    <i class="fab fa-whatsapp fa-2x acct"></i>
                </a>
            </div>
        </footer>

    </body>

        <!-- PHP -->
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require './pages/connection.php';
            $name=$_POST["name"];
            $email=$_POST["email"];
            $city=$_POST["city"];
            $balance=$_POST["amt"];
            
            $sql = "INSERT INTO customers(name,email,city,balance) VALUES ('$name','$email','$city',$balance)";
            if ($conn->query($sql) === TRUE) {
                echo "<script>success()</script>";   
            } else {
                echo "<script>error()</script>";
            }
            $conn->close();
        }
    ?>
</html>
