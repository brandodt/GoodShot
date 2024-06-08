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
                                <tr>
                                    <td>1</td>
                                    <td>Coca-Cola 500ml</td>
                                    <td>25.00</td>
                                    <td>3</td>
                                    <td>75.00</td>
                                    <td>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-danger is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Lays Potato Chips (Regular)</td>
                                    <td>30.00</td>
                                    <td>2</td>
                                    <td>60.00</td>
                                    <td>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-danger is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Magnum Classic Ice Cream Bar</td>
                                    <td>50.00</td>
                                    <td>1</td>
                                    <td>50.00</td>
                                    <td>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-danger is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Red Bull Energy Drink 250ml</td>
                                    <td>40.00</td>
                                    <td>2</td>
                                    <td>80.00</td>
                                    <td>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-danger is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Nestle KitKat Chocolate Bar</td>
                                    <td>20.00</td>
                                    <td>4</td>
                                    <td>80.00</td>
                                    <td>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-danger is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Pringles Original Chips</td>
                                    <td>45.00</td>
                                    <td>2</td>
                                    <td>90.00</td>
                                    <td>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-danger is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Marlboro Red Cigarettes</td>
                                    <td>150.00</td>
                                    <td>1</td>
                                    <td>150.00</td>
                                    <td>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-danger is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Colgate Total Toothpaste 150g</td>
                                    <td>60.00</td>
                                    <td>1</td>
                                    <td>60.00</td>
                                    <td>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-danger is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Nissin Cup Noodles (Chicken Flavor)</td>
                                    <td>20.00</td>
                                    <td>5</td>
                                    <td>100.00</td>
                                    <td>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-danger is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Sprite 1.5L</td>
                                    <td>45.00</td>
                                    <td>2</td>
                                    <td>90.00</td>
                                    <td>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-danger is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Jack 'n Jill Chippy (Garlic and Vinegar)</td>
                                    <td>15.00</td>
                                    <td>4</td>
                                    <td>60.00</td>
                                    <td>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-danger is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>San Miguel Pale Pilsen (Bottle)</td>
                                    <td>40.00</td>
                                    <td>3</td>
                                    <td>120.00</td>
                                    <td>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-danger is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Palmolive Naturals Shampoo 180ml</td>
                                    <td>70.00</td>
                                    <td>2</td>
                                    <td>140.00</td>
                                    <td>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-danger is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Alaska Condensed Milk 300ml</td>
                                    <td>30.00</td>
                                    <td>3</td>
                                    <td>90.00</td>
                                    <td>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-danger is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>Head & Shoulders Anti-Dandruff Shampoo 200ml</td>
                                    <td>120.00</td>
                                    <td>1</td>
                                    <td>120.00</td>
                                    <td>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-primary is-light is-small">
                                            <span class="icon">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                        <button class="button is-danger is-light is-small">
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
                <div class="cell">
                    <div class="box" style="background: #262322;">
                        <aside class="menu">
                            <ul class="menu-list">
                                <li class="subtitle is-5">
                                    <a id="search-modal-button" class="aside-link"
                                        style="background: #262322; color:white;">
                                        <span class="icon-text">
                                            <span class="icon">
                                                <i class="fas fa-search"></i>
                                            </span>
                                            <span>Search Product</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="subtitle is-5">
                                    <a id="payment-modal-button" class="aside-link"
                                        style="background: #262322; color:white;">
                                        <span class="icon-text">
                                            <span class="icon">
                                                <i class="fas fa-cash-register"></i>
                                            </span>
                                            <span>Settle Payment</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="subtitle is-5">
                                    <a id="clear-cart-modal-button" class="aside-link"
                                        style="background: #262322; color:white;">
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
                        <h4 class=" title is-4">Total Amount:</h4>
                        <h2 class="subtitle is-2">
                            P43,500.00
                        </h2>
                    </div>
                </div>
            </div>
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

    <!-- Search Modal -->
    <div id="search-modal-content" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Search</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <div class="field has-addons">
                    <div class="control is-expanded">
                        <input class="input" type="text" placeholder="Product ID / Product Name">
                    </div>
                    <div class="control">
                        <button class="button is-primary">
                            <span class="icon">
                                <i class="fas fa-search"></i>
                            </span>
                        </button>
                    </div>
                </div>
            </section>
            <footer class=" modal-card-foot">
            </footer>
        </div>
    </div>

    <!-- Payment Modal -->
    <div id="payment-modal-content" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Settle Payment</p>
                <button id="close-payment" class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <input name="totalAmount" type="number" class="input is-large is-rounded has-text-right" value="43500"
                    disabled>
                <input name="cashAmount" type="number" class="input is-large is-rounded mt-2 has-text-right"
                    value="50000" readonly>
                <input name="changeAmount" type="number" class="input is-large is-rounded mt-2 has-text-right"
                    value="6500" disabled>
                <br>
                <br>
                <div class="columns is-multiline">
                    <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4"
                            onclick="updateCashAmount(7)">7</button></div>
                    <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4"
                            onclick="updateCashAmount(8)">8</button></div>
                    <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4"
                            onclick="updateCashAmount(9)">9</button></div>
                    <div class="column is-one-quarter"><button class="button is-danger is-light is-fullwidth py-4"
                            onclick="clearCashAmount()">C</button></div>
                    <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4"
                            onclick="updateCashAmount(4)">4</button></div>
                    <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4"
                            onclick="updateCashAmount(5)">5</button></div>
                    <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4"
                            onclick="updateCashAmount(6)">6</button></div>
                    <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4"
                            onclick="updateCashAmount(0)">0</button></div>
                    <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4"
                            onclick="updateCashAmount(1)">1</button></div>
                    <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4"
                            onclick="updateCashAmount(2)">2</button></div>
                    <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4"
                            onclick="updateCashAmount(3)">3</button></div>
                    <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4"
                            onclick="updateCashAmount('00')">00</button></div>
                </div>
                <div class="columns is-centered">
                    <div class="column is-12"><button class="button is-primary is-fullwidth">Confirm</button></div>
                </div>
            </section>
            <footer class=" modal-card-foot">
            </footer>
        </div>
    </div>

    <!-- Clear Cart Modal -->
    <div id="clear-cart-modal-content" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Clear Cart</p>
                <!-- <button id="close-clear-cart" class="delete" aria-label="close"></button> -->
            </header>
            <section class="modal-card-body">
                <div class="columns">
                    <div class="column is-12">
                        <h5 class="title is-5">Are you sure you want to remove all the item in the cart?</h5>
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <div class="columns">
                    <div class="column is-6"><button class="button is-danger is-fullwidth is-medium">Yes</button></div>
                    <div class="column is-6"><button id="close-clear-cart"
                            class="button is-primary is-fullwidth is-medium">No</button></div>
                </div>
            </footer>
        </div>
    </div>

    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/sortable.js"></script>

</body>

</html>