<?php
session_start();

if (!isset($_SESSION["username"]) || $_SESSION["role"] !== "cashier") {
    $_SESSION["error"] = "Unauthorized access. Please login first.";
    header("location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" class="has-navbar-fixed-top">

<head>
    <meta charset="utf-8">
    <meta name="viewp1ort" content="width=device-width, initial-scale=1">
    <title>Cashier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bulma/bulma.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Scripts -->
    <script src="assets/js/modals/account.modal.js"></script>
    <script src="https://unpkg.com/vue@latest"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <style>
        .cell {
            display: grid;
            height: 100%;
        }
    </style>
</head>

<body>
    <nav class="navbar is-primary is-fixed-top is-spaced">
        <div class="navbar-brand">
            <a class="navbar-item " href="https://bulma.io">
                <img src="assets/img/logo_white.png" width="150">

            </a>
            <div class="navbar-burger js-burger" data-target="navbar">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div id="navbar" class="navbar-menu">
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="field">
                        <p class="control">
                            <a class="button is-link" id="account-modal-button">
                                <span class="icon">
                                    <i class="fas fa-user"></i>
                                </span>
                                <span> Account </span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div id="app">
        <section class="section">
            <div class="columns">
                <div class="column is-11">
                    <h3 class="title is-3">Daily Sales</h3>
                </div>
                <div class="column">
                    <a href="index.php" class="button is-primary">
                        <span class="icon">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span>Back</span>
                    </a>
                </div>
            </div>
            <div class="box" style="height: 70vh;">
                <table id="salesTable" class="table is-fullwidth is-striped">
                    <thead>
                        <tr>
                            <th>Transaction #</th>
                            <th>Date</th>
                            <th>Cashier Name</th>
                            <th>Total Amount</th>
                            <th>Action(s)</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- Modals -->
        <?php include "modals/account.modal.php"; ?>
    <section class="section">
        <div class="columns">
            <div class="column is-11">
                <h3 class="title is-3">Daily Sales</h3>
            </div>
            <div class="column">
                <a href="index.php" class="button is-primary">
                    <span class="icon">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    <span>Back</span>
                </a>
            </div>
        </div>
        <div class="box" style="height: 70vh;">
            <table id="salesTable" class="table is-fullwidth is-striped">
                <thead>
                    <tr>
                        <th>Transaction #</th>
                        <th>Date</th>
                        <th>Cashier Name</th>
                        <th>Total Amount</th>
                        <th>Action(s)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../includes/db/connection.php';
                    $db = new Database();
                    $conn = $db->connect();
                    $sql = "SELECT * FROM sales";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['date']}</td>";
                        echo "<td>{$row['cashierName']}</td>";
                        echo "<td>₱{$row['totalAmount']}</td>";
                        echo "<td><button class='button is-primary is-small' onclick='window.open(\"data:application/pdf;base64," . base64_encode($row['pdfFilePath']) . "\")'>View Receipt</button></td>";
                        echo "</tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </section>


    <!-- Modals -->

    <!-- Account Modal -->
    <div id="account-modal-content" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Settings</p>
            </header>
            <section class="modal-card-body">
                <div class="columns">
                    <div class="column is-4">
                        <aside class="menu has-text-centered">
                            <ul class="menu-list">
                                <li><a id="notifications" class="is-active py-4">Notifications</a></li>
                                <li><a id="account">Account</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="column is-8">
                        <div class="notification is-success">
                            New stock of <strong>product_name</strong> has arrived.
                        </div>
                        <div class="notification is-danger">
                            No stock <strong>product_name</strong>
                        </div>
                        <div class="notification is-warning">
                            Low stock <strong>product_name</strong>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <div class="field is-grouped">
                    <p class="control">
                        <button class="button is-primary">
                            Cancel
                        </button>
                    </p>
                    <p class="control">
                        <button class="button is-danger is-light" onclick="logout()">
                            Logout
                        </button>
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/js/sortable.js"></script>
</body>

</html>