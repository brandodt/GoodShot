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
        #searchbar {
            width: 53vh;
        }

        #dropdownmenu select {
            width: 29vh;
        }

        #dropdownmenu {
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
    <div class="fixed-grid has-7-cols">
        <div class="grid">
            <div class="cell nigga">
                <aside class="menu has-background-grey-light px-4 py-6">
                    <ul class="menu-list is-primary flex-column">
                        <li class="py-2"><a href="#" class="has-background-grey-light has-text-white nice">Dashboard</a>
                        </li>
                        <li class="py-2"><a href="sales-mgmt.php"
                                class="has-background-grey-light has-text-white nice">Sales Management</a>
                        </li>
                        <li class="py-2"><a href="invetory.php"
                                class="has-background-grey-light has-text-white nice">Inventory</a></li>
                        <li class="py-2"><a class="has-background-primary has-text-white">Product</a></li>
                        <li class="py-2"><a class="has-background-grey-light has-text-white nice">Supplies</a></li>
                        <li class="pt-2"><a class="has-background-grey-light has-text-white nice">Report</a></li>
                        <li class="flex-spacer"></li>
                        <hr>
                        <li class="pb-2"><a class="has-background-grey-light has-text-white nice">Settings</a></li>
                        <li class="py-2"><a class="has-background-grey-light has-text-white nice">Logout</a></li>
                    </ul>
                </aside>
            </div>
            <div class="cell is-col-span-6 pt-6">
                <h1 class="title">Product</h1>
                <div class="columns">
                    <div class="negar column is-9">
                        <div class="box">
                            <div class="container">

                                <div class="columns">
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
                            <div class="container">
                                <div class="buttons">
                                    <button class="button is-primary"><i class="fas fa-arrow-down"></i>Import
                                        Item</button>
                                    <button class="button is-primary"><i class="fas fa-plus"></i>New Item</button>
                                </div>
                                <div class="buttons">
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