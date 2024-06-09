<?php
session_start();

if (!isset($_SESSION["username"]) || $_SESSION["role"] !== "cashier") {
    $_SESSION["error"] = "Unauthorized access. Please login first.";
    header("location: ../");
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
    <link rel="stylesheet" href="../assets/css/bulma.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/img/gs.png" type="image/x-icon">
    <!-- Scripts -->
    <script src="../assets/js/account.modal.js"></script>
    <script src="../assets/js/search.modal.js"></script>
    <script src="../assets/js/payment.modal.js"></script>
    <script src="../assets/js/clear-cart.modal.js"></script>
    <script src="https://unpkg.com/vue@latest"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
                <img src="../assets/img/logo_white.png" width="150">

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
            <div class="fixed-grid has-4-cols">
                <div class="grid">
                    <div class="cell">
                        <div class="box">
                            <h1 class="title is-1">Cashier</h1>
                            <h4 class="subtitle is-4">Juan Dela Cruz</h4>
                            <p>
                                <strong>Transaction #: </strong>0606241117
                            </p>
                            <p>
                                <strong>Transaction Date: </strong><span id="transaction-date"></span>
                            </p>
                        </div>
                    </div>
                    <div class="cell is-row-span-3 is-col-span-3">
                        <div class="box">
                            <div class="scrollable-table">
                                <table id="sorTable" class="table is-striped is-fullwidth">
                                    <thead>
                                        <tr>
                                            <th onclick="sortTable(0)" class="is-clickable">#</th>
                                            <th onclick="sortTable(1)" class="is-clickable">Product Name</th>
                                            <th onclick="sortTable(2)" class="is-clickable">Price</th>
                                            <th onclick="sortTable(3)" class="is-clickable">Quantity</th>
                                            <th onclick="sortTable(4)" class="is-clickable">Total</th>
                                            <th>Action(s)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in cart" :key="index">
                                            <td>{{ index + 1 }}</td>
                                            <td>{{ item.product.name }}</td>
                                            <td>{{ item.product.price }}</td>
                                            <td>{{ item.quantity }}</td>
                                            <td>{{ item.product.price * item.quantity }}</td>
                                            <td>
                                                <button class="button is-primary is-light is-small" @click="decreaseQuantity(item)">
                                                    <span class="icon">
                                                        <i class="fas fa-minus"></i>
                                                    </span>
                                                </button>
                                                <button class="button is-primary is-light is-small" @click="increaseQuantity(item)">
                                                    <span class="icon">
                                                        <i class="fas fa-plus"></i>
                                                    </span>
                                                </button>
                                                <button class="button is-danger is-light is-small" @click="removeItem(index)">
                                                    <span class="icon">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="cell">
                        <div class="box" style="background: #262322;">
                            <aside class="menu">
                                <ul class="menu-list">
                                    <li class="subtitle is-5">
                                        <a id="search-modal-button" class="aside-link" style="background: #262322; color:white;">
                                            <span class="icon-text">
                                                <span class="icon">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                                <span>Search Product</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="subtitle is-5">
                                        <a id="payment-modal-button" class="aside-link" style="background: #262322; color:white;">
                                            <span class="icon-text">
                                                <span class="icon">
                                                    <i class="fas fa-cash-register"></i>
                                                </span>
                                                <span>Settle Payment</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="subtitle is-5">
                                        <a id="clear-cart-modal-button" class="aside-link" style="background: #262322; color:white;">
                                            <span class="icon-text has-text-danger">
                                                <span class="icon">
                                                    <i class="fas fa-trash-alt"></i>
                                                </span>
                                                <span>Clear Cart</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="subtitle is-5">
                                        <a href="sales.php" class="aside-link" style="background: #262322; color:white;">
                                            <span class="icon-text">
                                                <span class="icon">
                                                    <i class="fas fa-scroll"></i>
                                                </span>
                                                <span>Daily Sales</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                    <div class="cell">
                        <div class="box">
                            <h4 class="title is-4">Total Amount:</h4>
                            <h2 class="subtitle is-2">
                                {{ formattedTotalAmount }}
                            </h2>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Modals -->
        <?php include "modal/account.modal.php"; ?>
        <?php include "modal/search.modal.php"; ?>
        <?php include "modal/payment.modal.php"; ?>
        <?php include "modal/clear-cart.modal.php"; ?>
    </div>
    <script src="../assets/js/Vue.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/sortable.js"></script>
</body>

</html>