<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bulma/bulma.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .nigger {
            display: grid;
            height: 20vh;
        }

        .icon-text-stack {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .scrollable-table {
            max-height: 35vh;
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
                                class="has-background-grey-light has-text-white nice">Sales Management</a></li>
                    </ul>
                    <hr>
                    <p class="menu-label has-text-white">Storage</p>
                    <ul class="menu-list">
                        <li class="pt-2">
                            <a href="#" class="has-background-primary has-text-white">Inventory</a>
                            <ul>
                                <li class="py-2"><a href="product.php"
                                        class="has-background-grey-light has-text-white nice">Product</a>
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
                <h1 class="title has-text-white">Inventory Overview</h1>
                <div class="fixed-grid has-7-cols">
                    <div class="grid">
                        <div class=" cell" style="height: 20vh;">
                            <div class="icon-text-stack box">
                                <span class="fa-stack fa-2x has-text-link">
                                    <i class="far fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-shopping-basket fa-stack-1x"></i>
                                </span>
                                <br>
                                <h5 class="subtitle is-6">Total Products<br><br></h5>
                                <span class="title is-4">3,149</span>
                            </div>
                        </div>
                        <div class=" cell" style="height: 20vh;">
                            <div class="icon-text-stack box">
                                <span class="fa-stack fa-2x has-text-primary">
                                    <i class="far fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-boxes fa-stack-1x"></i>
                                </span>
                                <br>
                                <h5 class="subtitle is-6">Items Sold<br><br></h5>
                                <span class="title is-4">21,092</span>
                            </div>
                        </div>
                        <div class=" cell" style="height: 20vh;">
                            <div class="icon-text-stack box">
                                <span class="fa-stack fa-2x has-text-success">
                                    <i class="far fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-shopping-basket fa-stack-1x"></i>
                                </span>
                                <br>
                                <h5 class="subtitle is-6">New Products<br><br></h5>
                                <span class="title is-4">21</span>
                            </div>
                        </div>
                        <div class=" cell" style="height: 20vh;">
                            <div class="icon-text-stack box">
                                <span class="fa-stack fa-2x has-text-danger">
                                    <i class="far fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-shopping-basket fa-stack-1x"></i>
                                </span>
                                <br>
                                <h5 class="subtitle is-6">Low Stocks<br><br></h5>
                                <span class="title is-4">41</span>
                            </div>
                        </div>
                        <div class="cell is-col-span-3 is-row-span-12" style="height: 20vh;">
                            <div class="box">
                                <span class="has-text-weight-bold">
                                    Product Overview
                                </span>
                                <br>
                                <br>
                                <div class="column is-flex is-justify-content-space-between">
                                    <span class="icon-text ml-5">
                                        <span class="icon is-large has-text-primary">
                                            <i class="fas fa-2x fas fa-shopping-cart""></i>
                                                </span>
                                                <span class=" title is-5">Total Category<br><b>13</b></span>
                                    </span>

                                    <span class="icon-text mr-6">
                                        <span class="icon is-large has-text-primary">
                                            <i class="fas fa-2x fas fa-tag""></i>
                                                </span>
                                                <span class=" title is-5">Brands<br><b>18</b></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class=" cell is-col-span-3 is-row-span-12">
                            <div class="box" style="height:100%;">
                                <span class="has-text-weight-bold has-text-danger">
                                    Low Stock Products
                                </span>
                                <div class="table" style="flex-grow: 1; overflow-y: auto;">
                                    <table class="table is-fullwidth">
                                        <thead>
                                            <tr>
                                                <td>Product</td>
                                                <td>Code</td>
                                                <td>Stocks</td>
                                                <td>Price</td>

                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>Amogus</td>
                                            <td class="has-text-weight-semibold">108012</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                        </tr>
                                        <tr>
                                            <td>Amogus</td>
                                            <td class="has-text-weight-semibold">108012</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                        </tr>
                                        <tr>
                                            <td>Amogus</td>
                                            <td class="has-text-weight-semibold">108012</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                        </tr>
                                        <tr>
                                            <td>Amogus</td>
                                            <td class="has-text-weight-semibold">108012</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                        </tr>
                                        <tr>
                                            <td>Amogus</td>
                                            <td class="has-text-weight-semibold">108012</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                        </tr>
                                        <tr>
                                            <td>Amogus</td>
                                            <td class="has-text-weight-semibold">108012</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                        </tr>
                                        <tr>
                                            <td>Amogus</td>
                                            <td class="has-text-weight-semibold">108012</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                        </tr>
                                        <tr>
                                            <td>Amogus</td>
                                            <td class="has-text-weight-semibold">108012</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                        </tr>
                                        <tr>
                                            <td>Amogus</td>
                                            <td class="has-text-weight-semibold">108012</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                        </tr>
                                        <tr>
                                            <td>Amogus</td>
                                            <td class="has-text-weight-semibold">108012</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                        </tr>
                                        <tr>
                                            <td>Amogus</td>
                                            <td class="has-text-weight-semibold">108012</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class=" cell is-col-span-2" style="height: 50vh;">
                            <div class="box" style="height:100%;">
                                <span class="title is-4 has-text-weight-bold has-text-success">
                                    New Arrival
                                </span>
                                <i class="fas fa-expand-arrows-alt "></i>
                                <br>
                                <span>as of May 21 2024</span>
                                <div class="table">
                                    <table class="table is-fullwidth">
                                        <thead>
                                            <tr>
                                                <td>Product</td>
                                                <td>Code</td>
                                                <td>Price</td>

                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>Boar rat</td>
                                            <td class="has-text-weight-semibold">101100</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                           
                                        </tr>
                                        <tr>
                                            <td>Boar rat</td>
                                            <td class="has-text-weight-semibold">101100</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                           
                                        </tr>
                                        <tr>
                                            <td>Boar rat</td>
                                            <td class="has-text-weight-semibold">101100</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                           
                                        </tr>
                                        <tr>
                                            <td>Boar rat</td>
                                            <td class="has-text-weight-semibold">101100</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                        </tr>
                                        <tr>
                                            <td>Boar rat</td>
                                            <td class="has-text-weight-semibold">101100</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                           
                                        </tr>
                                        <tr>
                                            <td>Boar rat</td>
                                            <td class="has-text-weight-semibold">101100</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                           
                                        </tr>
                                        <tr>
                                            <td>Boar rat</td>
                                            <td class="has-text-weight-semibold">101100</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                        </tr>
                                         <tr>
                                            <td>Boar rat</td>
                                            <td class="has-text-weight-semibold">101100</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class=" cell is-col-span-2" style="height: 20vh;">
                             <div class="box">

                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>