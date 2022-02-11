
<?php
    global $name;
    $name=$_GET['name'];
?>

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
        <link rel="stylesheet" href="../styles/customerDetails.css">
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
        <!-- FontAwesome -->
        <script
            src="https://kit.fontawesome.com/b024a0525a.js"
            crossorigin="anonymous"
        ></script>

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
    
            <!-- Details -->
    
            <div class="details-container center">
                <?php
                    global $email;
                    global $city;
                    global $balance;
                    require 'connection.php';
                    $sql = "SELECT * FROM customers where name='".$name."'";
                    $result = $conn->query($sql);
                    if ($result -> num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $email=$row['email'];
                            $city=$row['city'];
                            $balance=$row['balance'];
                        }
                    }
                    $conn->close();
                ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="left">
                            <h3>Name</h3>
                            <span class="data"><?php echo $name;?></span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="left">
                            <h3>E-mail</h3>
                            <span class="data"><?php echo $email;?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="left">
                            <h3>City</h3>
                            <span class="data"><?php echo $city;?></span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="left">
                            <h3>Balance</h3>
                            <span class="data"><?php echo "₹".$balance;?></span>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Transaction Log -->
            <div class="history center">
                <div class="hr"></div>
                    <h2 class="title">Transaction History</h2>
                <div class="hr"></div>
            </div>
            <div class="center">

                <div class="table center">
                    <table>
                        <?php
                            require 'connection.php';
                            $sql = "SELECT * FROM transactions where sender='".$name."' OR receiver='".$name."' order by time desc";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) { 
                                while($row = $result->fetch_assoc()) {
                                    $sender = $row['sender'];
                                    $receiver = $row['receiver'];
                                    $amount = $row['amount'];
                                    $time=$row['time'];
                                    if($sender == $name){
                                        echo ("<tr class='red'><td>".$sender."</td><td>".$receiver."</td><td>↓ ".$amount."</td><td>".$time."</td></tr>");
                                    }
                                    else{
                                        echo ("<tr class='green'><td>".$sender."</td><td>".$receiver."</td><td>↑ ".$amount."</td><td>".$time."</td></tr>");
                                    }
                                } 
                            } 
                            else {
                                echo ("<tr><td>-</td><td>-</td><td>-</td></tr>");
                            }
                            $conn->close();
                        ?>
                    </table>
                </div>
            </div>
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
</html>