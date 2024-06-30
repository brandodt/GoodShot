<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supplies</title>
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
                                <li class="py-2"><a href="#" class="has-background-primary has-text-white">Supplies</a>
                                </li>
                            </ul>
                        </li>
                        <li class="pt-2"><a href="report.php"
                                class="has-background-grey-light has-text-white nice">Report</a></li>
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
                <h1 class="title has-text-white">Add Product</h1>
                <div class="columns">
                    <div class="column">
                        <div class="box" style="height:84vh">
                            <form action="add-product.php" method="post">
                                <div class="columns">
                                    <div class="column is-6">
                                        <div class="field">
                                            <label class="label">Product Name</label>
                                            <div class="control">
                                                <input class="input" type="text" name="product_name" required>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label">Brand Name</label>
                                            <div class="control">
                                                <input class="input" type="text" name="brand" required>
                                            </div>
                                            <!-- <div class="control">
                                                <input class="input" type="number" name="product_price" required>
                                            </div> -->
                                            <div class="field">
                                                <label class="label">Product Category</label>
                                                <div class="field has-addons">
                                                    <div class="control is-expanded">
                                                        <div class="select is-fullwidth">
                                                            <select name="category">
                                                                <option value="1">Category 1</option>
                                                                <option value="2">Category 2</option>
                                                                <option value="3">Category 3</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label">Unit</label>
                                            <div class="field has-addons">
                                                <div class="control is-expanded">
                                                    <div class="select is-fullwidth">
                                                        <select name="unit">
                                                            <option value="1">pieces</option>
                                                            <option value="2">kg</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="field is-grouped is-grouped-right">
                                    <div class="control">
                                        <button class="button is-primary" type="submit">Submit</button>
                                    </div>
                                    <div class="control">
                                        <button class="button is-primary is-light" type="reset">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>