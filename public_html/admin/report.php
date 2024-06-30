<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bulma/bulma.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/sortable.js"></script>
    <style>
        .nigger {
            display: grid;
            height: 43vh;
        }

        .niggus {
            display: grid;
            height: 40vh;
        }

        .scrollable-table {
            height: 55vh;
            max-height: 80vh;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <div class="section">
        <div class="columns">
            <div class="column is-2">
                <aside class="menu">
                    <p class="lego has-text-primary is-size-1">GOODSHOT</p>
                    <p class="menu-label has-text-white">Overview</p>
                    <ul class="menu-list">
                        <li class="pt-2"><a href="index.php"
                                class="has-background-grey-light has-text-white nice">Dashboard</a>
                        </li>
                        <li class="pt-2"><a href="sales-mgmt.php"
                                class="has-background-grey-light has-text-white nice">Sales
                                Management</a></li>
                    </ul>
                    <hr>
                    <p class="menu-label has-text-white">Storage</p>
                    <ul class="menu-list">
                        <li class="pt-2">
                            <a href="inventory.php" class="has-background-grey-light has-text-white nice">Inventory</a>
                            <ul>
                                <li class="py-2"><a href="product.php"
                                        class="has-background-grey-light has-text-white nice">Product</a>
                                </li>
                                <li class="py-2"><a href="supplies.php"
                                        class="has-background-grey-light has-text-white nice">Supplies</a>
                                </li>
                            </ul>
                        </li>
                        <li class="pt-2"><a href="#" class="has-background-primary has-text-white">Report</a></li>
                    </ul>
                    <hr>
                    <p class="menu-label has-text-white">Account</p>
                    <ul class="menu-list">
                        <li class="pb-2"><a href="settings.php"
                                class="has-background-grey-light has-text-white nice">Settings</a></li>
                        <li class="py-2"><a class="has-background-grey-light has-text-white nice"
                                onclick="logout()">Logout</a></li>
                    </ul>
                </aside>
            </div>
            <div class="column is-10">
                <h1 class="title has-text-white">Sales Report</h1>
                <div class="columns">
                    <div class="negar column">
                        <div class="box">
                            <div class="container">
                                <div class="columns">
                                    <div class="column is-3">
                                        <!-- <div class="columns is-vcentered">
                                            <div class="column is-narrow">
                                                <span class="icon-text-stack fa-md">
                                                    <span class="fa-stack fa-2x has-text-primary">
                                                        <i class="far fa-circle fa-stack-2x"></i>
                                                        <i class="fas fa-box fa-stack-1x"></i>
                                                    </span>
                                                </span>
                                            </div>
                                            <div class="column is-narrow">
                                                <div>
                                                    <span class="is-size-6">Available Products:</span>
                                                    <br>
                                                    <p class="has-text-weight-bold is-size-4 has-text-right">103</p>
                                                </div>
                                                <div>
                                                    <span class="is-size-6">Low Stock:</span>
                                                    <br>
                                                    <p class="has-text-weight-bold is-size-4 has-text-right">16</p>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>

                                <!-- <div class="field">
                                    <div class="control">
                                        <label class="radio">
                                            <input type="radio" name="question">
                                            Ascending
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="question">
                                            Descending
                                        </label>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                    <!-- <div class="negar column is-4">
                        <div class="box">
                            
                        </div>
                    </div> -->
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="box">
                            <div class="field has-addons">
                                <p class="control">
                                    <span class="select">
                                        <select>
                                            <option>ID</option>
                                            <option>Product</option>
                                            <option>Category</option>
                                        </select>
                                    </span>
                                </p>
                                <p class="control is-expanded">
                                    <input class="input" type="text" placeholder="Search item...">
                                </p>
                                <p class="control">
                                    <button class="button">
                                        Search
                                    </button>
                                </p>
                            </div>
                            <div class="scrollable-table">
                                <div class="table">
                                    <table class="table is-fullwidth">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product</th>
                                                <th>Category</th>
                                                <th>Sold Qty.</th>
                                                <th>Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td class="has-text-weight-semibold">10010</td>
                                            <td>Tubol</td>
                                            <td>FOOD</td>
                                            <td>69</td>
                                            <td>₱1337</td>
                                        </tr>
                                        <tr>
                                            <td class="has-text-weight-semibold">10010</td>
                                            <td>Tubol</td>
                                            <td>FOOD</td>
                                            <td>69</td>
                                            <td>₱1337</td>
                                        </tr>
                                        <tr>
                                            <td class="has-text-weight-semibold">10010</td>
                                            <td>Tubol</td>
                                            <td>FOOD</td>
                                            <td>69</td>
                                            <td>₱1337</td>
                                        </tr>
                                        <tr>
                                            <td class="has-text-weight-semibold">10010</td>
                                            <td>Tubol</td>
                                            <td>FOOD</td>
                                            <td>69</td>
                                            <td>₱1337</td>
                                        </tr>
                                        <tr>
                                            <td class="has-text-weight-semibold">10010</td>
                                            <td>Tubol</td>
                                            <td>FOOD</td>
                                            <td>69</td>
                                            <td>₱1337</td>
                                        </tr>
                                        <tr>
                                            <td class="has-text-weight-semibold">10010</td>
                                            <td>Tubol</td>
                                            <td>FOOD</td>
                                            <td>69</td>
                                            <td>₱1337</td>
                                        </tr>
                                        <tr>
                                            <td class="has-text-weight-semibold">10010</td>
                                            <td>Tubol</td>
                                            <td>FOOD</td>
                                            <td>69</td>
                                            <td>₱1337</td>
                                        </tr>
                                        <tr>
                                            <td class="has-text-weight-semibold">10010</td>
                                            <td>Tubol</td>
                                            <td>FOOD</td>
                                            <td>69</td>
                                            <td>₱1337</td>
                                        </tr>
                                        <tr>
                                            <td class="has-text-weight-semibold">10010</td>
                                            <td>Tubol</td>
                                            <td>FOOD</td>
                                            <td>69</td>
                                            <td>₱1337</td>
                                        </tr>
                                        <tr>
                                            <td class="has-text-weight-semibold">10010</td>
                                            <td>Tubol</td>
                                            <td>FOOD</td>
                                            <td>69</td>
                                            <td>₱1337</td>
                                        </tr>
                                        <tr>
                                            <td class="has-text-weight-semibold">10010</td>
                                            <td>Tubol</td>
                                            <td>FOOD</td>
                                            <td>69</td>
                                            <td>₱1337</td>
                                        </tr>
                                        <tr>
                                            <td class="has-text-weight-semibold">10010</td>
                                            <td>Tubol</td>
                                            <td>FOOD</td>
                                            <td>69</td>
                                            <td>₱1337</td>
                                        </tr>
                                        <tr>
                                            <td class="has-text-weight-semibold">10010</td>
                                            <td>Tubol</td>
                                            <td>FOOD</td>
                                            <td>69</td>
                                            <td>₱1337</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>