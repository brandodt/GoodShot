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
                    <img src="assets/img/logo_purple.png">
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
                                <li class="py-2"><a href="#" class="has-background-primary has-text-white">Product</a>
                                </li>
                                <li class="py-2"><a class="has-background-grey-light has-text-white nice">Supplies</a>
                                </li>
                            </ul>
                        </li>
                        <li class="pt-2"><a class="has-background-grey-light has-text-white nice">Report</a></li>
                    </ul>
                    <hr>
                    <p class="menu-label has-text-white">Account</p>
                    <ul class="menu-list">
                        <li class="pb-2"><a class="has-background-grey-light has-text-white nice">Settings</a></li>
                        <li class="py-2"><a class="has-background-grey-light has-text-white nice"
                                onclick="logout()">Logout</a></li>
                    </ul>
                </aside>
            </div>
            <div class="column is-10">
                <h1 class="title has-text-white">Product</h1>
                <div class="columns">
                    <div class="negar column is-8">
                        <div class="box">
                            <div class="container">

                                <div class="field">
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Search">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <div class="select">
                                            <select>
                                                <option>Select dropdown</option>
                                                <option>ID</option>
                                                <option>Category</option>
                                                <option>Product</option>
                                                <option>Brand</option>
                                            </select>
                                        </div>
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
                    <div class="negar column is-4">
                        <div class="box">
                            <div class="container" id="sortTools">
                                <div class="buttons">
                                    <button class="button is-primary">
                                        <span class="icon is-small">
                                            <i class="fas fa-arrow-down"></i>
                                        </span>
                                        <span>Import Item</span>
                                    </button>
                                    <button class="button is-primary">
                                        <span class="icon is-small">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span>New Item</span>
                                    </button>
                                </div>
                                <div class="buttons" id="setOfButtons2">
                                    <button class="button is-dark">Sort</button>
                                    <button class="button is-primary">
                                        <span class="icon is-small">
                                            <i class="fas fa-redo-alt"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-12">
                        <div class="box">
                            <div class="scrollable-table">
                                <div class="table">
                                    <table class="table is-fullwidth">
                                        <thead>
                                            <tr>
                                                <td>ID</td>
                                                <td>Category</td>
                                                <td>Quantity</td>
                                                <td>Brand</td>
                                                <td>Stock</td>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
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