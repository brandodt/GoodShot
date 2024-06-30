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
    <script>
        function singleSelect(checkbox) {
            var checkboxes = document.querySelectorAll('input[name="options"]');
            checkboxes.forEach((item) => {
                if (item !== checkbox) item.checked = false;
            });
        }
    </script>
    <style>
        #setOfButtons2 {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-right: 10px;
        }

        #searchbar {
            width: 53vh;
        }

        #dropdownmenu select {
            width: 29vh;
        }

        #dropdownmenu {
            margin-top: 10px;
            margin-bottom: 0px;
            margin-left: -40px;
        }

        .checkbox {
            white-space: nowrap;
            width: auto;
            margin-left: 50px;
        }

        .nigger {
            display: grid;
            height: 43vh;
        }

        .niggus {
            display: grid;
            height: 40vh;
        }

        select {
            margin-left: 40px;

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
                        <li class="py-2"><a class="has-background-grey-light has-text-white nice">Logout</a></li>
                    </ul>
                </aside>
            </div>
            <div class="column is-10">
                <h1 class="title">Product</h1>
                <div class="columns">
                    <div class="negar column is-9">
                        <div class="box">
                            <div class="container">
                                <div class="columns" id="searchTools">
                                    <div class="column is-3" id="searchbar">
                                        <input class="input" type="text" placeholder="Search" />
                                    </div>
                                </div>
                                <div class="columns" id="dropdownmenu">
                                    <div class="select">
                                        <select>
                                            <option value="" selected disabled>Sort</option>
                                            <option value="option1">ID</option>
                                            <option value="option2">Category</option>
                                            <option value="option3">Brand</option>
                                        </select>
                                    </div>
                                    <!-- I DELETED THIS PART
                                    <div class="select">
                                        <select>
                                            <option>Quantity</option>
                                            <option>Ascending</option>
                                            <option>Descending</option>
                                        </select>
                                    </div>
                                    <div class="select">
                                        <select>
                                            <option>Brand</option>
                                            <option>Ascending</option>
                                            <option>Descending</option>
                                        </select>
                                    </div>
                                    <div class="select">
                                        <select>
                                            <option>Stocks</option>
                                            <option>Ascending</option>
                                            <option>Descending</option>
                                        </select>
                                    </div>
                                -->
                                    <div class="checkbox">
                                        <form>
                                            <input type="checkbox" id="option1" name="options" value="option1"
                                                onclick="singleSelect(this)">
                                            <label for="option1">Ascending</label><br>

                                            <input type="checkbox" id="option2" name="options" value="option2"
                                                onclick="singleSelect(this)">
                                            <label for="option2">Descending</label><br>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="negar column is-3 ">
                        <div class="box">
                            <div class="container" id="sortTools">
                                <div class="buttons">
                                    <button class="button is-primary"><i class="fas fa-arrow-down"></i>Import
                                        Item</button>
                                    <button class="button is-primary"><i class="fas fa-plus"></i>New Item</button>
                                </div>
                                <div class="buttons" id="setOfButtons2">
                                    <button class="button is-dark">Sort</button>
                                    <button class="button is-primary"><i class="fas fa-redo-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-12">
                        <div class="box">
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
                                    <tr>
                                        <td>10010</td>
                                        <td class="has-text-weight-semibold">Tubol</td>
                                        <td class="has-text-weight-semibold">₱600</td>
                                        <td class="has-text-weight-semibold">421</td>
                                        <td class="has-text-weight-semibold">300</td>
                                    <tr>
                                        <td>10010</td>
                                        <td class="has-text-weight-semibold">Tubol</td>
                                        <td class="has-text-weight-semibold">₱600</td>
                                        <td class="has-text-weight-semibold">421</td>
                                        <td class="has-text-weight-semibold">300</td>
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
                                    <tr>
                                        <td>10010</td>
                                        <td class="has-text-weight-semibold">Tubol</td>
                                        <td class="has-text-weight-semibold">₱600</td>
                                        <td class="has-text-weight-semibold">421</td>
                                        <td class="has-text-weight-semibold">300</td>
                                    <tr>
                                        <td>10010</td>
                                        <td class="has-text-weight-semibold">Tubol</td>
                                        <td class="has-text-weight-semibold">₱600</td>
                                        <td class="has-text-weight-semibold">421</td>
                                        <td class="has-text-weight-semibold">0</td>

                                    <tr>
                                        <td>10010</td>
                                        <td class="has-text-weight-semibold">Tubol</td>
                                        <td class="has-text-weight-semibold">₱600</td>
                                        <td class="has-text-weight-semibold">421</td>
                                        <td class="has-text-weight-semibold">0</td>

                                    <tr>
                                        <td>10010</td>
                                        <td class="has-text-weight-semibold">Tubol</td>
                                        <td class="has-text-weight-semibold">₱600</td>
                                        <td class="has-text-weight-semibold">421</td>
                                        <td class="has-text-weight-semibold">0</td>

                                    <tr>
                                        <td>10010</td>
                                        <td class="has-text-weight-semibold">Tubol</td>
                                        <td class="has-text-weight-semibold">₱600</td>
                                        <td class="has-text-weight-semibold">421</td>
                                        <td class="has-text-weight-semibold">0</td>

                                    <tr>
                                        <td>10010</td>
                                        <td class="has-text-weight-semibold">Tubol</td>
                                        <td class="has-text-weight-semibold">₱600</td>
                                        <td class="has-text-weight-semibold">421</td>
                                        <td class="has-text-weight-semibold">0</td>

                                    <tr>
                                        <td>10010</td>
                                        <td class="has-text-weight-semibold">Tubol</td>
                                        <td class="has-text-weight-semibold">₱600</td>
                                        <td class="has-text-weight-semibold">421</td>
                                        <td class="has-text-weight-semibold">0</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>