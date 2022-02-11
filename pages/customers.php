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
        <link rel="stylesheet" href="../styles/customers.css">
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
    
            <!-- Table -->
            <div class="heading center">
                <div class="hr"></div>
                    <h2 class="title">Our Customers</h2>
                <div class="hr"></div>
                <?php
                    require 'connection.php';
                    $sql = "SELECT * FROM customers order by name";
                    $result = $conn->query($sql);
                    global $i;
                    $i=1;?>
                    <div class="customers">
                        <table>
                            <thead>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>City</th>
                                <th>Balance</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php if ($result->num_rows > 0) { 
                                    while($row = $result->fetch_assoc()) {?>
                                        <tr>
                                            <td><?php echo $i;$i++; ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['city'] ?></td>
                                            <td><?php echo $row['balance'] ?></td>
                                            <td>
                                            <a href="customerDetails.php?name=<?php echo $row['name'];?>">
                                                <button type="submit" class="button">View</button> </a>  
                                            </td>
                                        </tr>
                                    <?php } 
                                } 
                                else {
                                    echo ("<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>");
                                }?>
                            </tbody>
                        </table>
                    </div>
                    <?php $conn->close();
                ?>
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