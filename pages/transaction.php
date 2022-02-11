<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Primo</title>
        <link rel="shortcut icon" href="../images/bank.png" type="image/x-icon">

        <!-- BootStrap -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
            integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
            crossorigin="anonymous"
        />

        <!-- CSS -->
        <link rel="stylesheet" href="../styles/defaultStyles.css">
        <link rel="stylesheet" href="../styles/transaction.css">
        <!-- FontAwesome -->
        <script
            src="https://kit.fontawesome.com/b024a0525a.js"
            crossorigin="anonymous"
        ></script>

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
        <!-- Alert -->
        <script>
            function transaction(){
                event.preventDefault();
                var form = event.target.form;
                swal({
                    title: "Proceed with Transaction?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    } else {
                        swal("Transaction Cancelled",{
                            icon:"error",
                        });
                    }
                });
            }
            function success() {
                swal({
                    title: "Transaction Completed!",
                    icon: "success",
                }).then(function() {
                window.location = "transactionLog.php";
                });
            }
            function error() {
                swal({
                    title: "OOPS!",
                    text: "Please check the details entered!",
                    icon: "error",
                }).then(function() {
                window.location = "transaction.php";
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
                            <a class="nav-link" href="../index.php">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="customers.php">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="transaction.php">Credit Transfer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="transactionLog.php">Transaction Log</a>
                        </li>
                    </ul>
                </div>
            </nav>
    
            <!-- Transaction Container -->
            <div class="heading center">
                <div class="hr"></div>
                    <h2 class="title">Credit Transfer</h2>
                <div class="hr"></div>
            </div>
            <div class="transfer">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div class="box center">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 ip">
                                <h4>From</h4>
                                <select class="form-control drpdown" name="from" required>
                                    <option disabled selected value> -- select Sender -- </option>
                                    <?php
                                    require 'connection.php';
                                    $sql = "SELECT * FROM customers order by name";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) { 
                                        while($row = $result->fetch_assoc()) {?>
                                            <option><?php echo $row['name']; ?></option>
                                        <?php } 
                                    } 
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 ip">
                                <h4>To</h4>
                                <select class="form-control drpdown" name="to" required>
                                    <option disabled selected value> -- select Receiver -- </option>
                                    <?php
                                        require 'connection.php';
                                        $sql = "SELECT * FROM customers order by name";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) { 
                                            while($row = $result->fetch_assoc()) {?>
                                                <option><?php echo $row['name']; ?></option>
                                                <?php } 
                                        } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row2">
                            <h4>Transaction Amount</h4>
                            <input type="number" class="form-control amt" name="amount" required>
                        </div>
                        <button type="button" onclick="transaction()" class="btn btn-info btn-lg btn-block">Proceed</button>
                    </div>
                </form>
            </div>
        </div>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $sender = $_REQUEST['from'];
                $receiver = $_REQUEST['to'];
                $amount = $_REQUEST['amount'];
                if(empty($sender) || empty($receiver) || empty($amount)){
                    echo '<script>swal({
                        title: "Input Fields Cannot be empty!",
                        icon: "error",
                    })</script>';
                }
                else if ($sender == $receiver) {
                    echo '<script>swal("Oops!","Sender And Receiver cannot be same","info")</script>';
                } else {
                    require 'connection.php';
                    $sql = "SELECT balance FROM customers WHERE name='".$sender."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            global $sender_balance;
                            $sender_balance = $row['balance'];
                        }
                    }
                    if($sender_balance < $amount){
                        echo '<script>swal("Insufficient Balance !","The transaction amount is less than your current balance.","error")</script>';
                    }
                    else{
                        $sql = "SELECT balance FROM customers WHERE name='".$receiver."'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                global $receiver_balance;
                                $receiver_balance = $row['balance'];
                            }
                        }
                        $sender_balance-=$amount;
                        $receiver_balance+=$amount;
                        $sql = "INSERT INTO transactions(sender,receiver,amount) VALUES ('$sender','$receiver','$amount')";
                        if ($conn->query($sql) === TRUE) {
                            echo "<script>success()</script>";   
                        } else {
                            echo "<script>error()</script>";
                        }
                        $sql = "UPDATE customers SET balance='".$sender_balance."' WHERE name='".$sender."'";
                        $conn->query($sql);
                        $sql = "UPDATE customers SET balance='".$receiver_balance."' WHERE name='".$receiver."'";
                        $conn->query($sql);
                    }
                    $conn->close();
                }
            }
        ?>
        
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
</html>