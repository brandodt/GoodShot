<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bulma/bulma.css">
    <style>
        .nigga {
            display: grid;
            height: 100vh;
        }

        .nigger {
            display: grid;
            height: 40vh;
        }

        .niggus {
            display: grid;
            height: 45vh;
        }

        .menu-list.flex-column {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .flex-spacer {
            flex: 1;
        }

        .box {
            margin: 5px;
        }
        .scrollable-table {
            max-height: 30vh;
            overflow-y: auto;
          }
    </style>
</head>

<body>
    <div class="fixed-grid has-7-cols">
        <div class="grid">
            <div class="cell nigga">
                <aside class="menu has-background-grey-light px-4 py-6">
                    <ul class="menu-list is-primary flex-column">
                        <li class="py-2"><a>Dashboard</a></li>
                        <li class="py-2"><a>Sales Management</a></li>
                        <li class="py-2"><a>Inventory</a></li>
                        <li class="py-2"><a>Product</a></li>
                        <li class="py-2"><a>Supplies</a></li>
                        <li class="pt-2"><a>Report</a></li>
                        <li class="flex-spacer"></li>
                        <hr>
                        <li class="pb-2"><a>Settings</a></li>
                        <li class="py-2"><a>Logout</a></li>
                    </ul>
                </aside>
            </div>
            <div class="cell is-col-span-6 pt-6">
                <h1 class="title">Dashboard</h1>
                <div class="fixed-grid has-5-cols">
                    <div class="grid">
                        <div class="nigger cell is-col-span-2">
                            <div class="box">
                                <span class="has-text-weight-bold">
                                    Sales Overview
                                </span>
                                <section class="section">

                                    <div class="columns">
                                        <div class="column">
                                            <span class="icon-text">
                                                <span class="icon is-large has-text-link">
                                                    <i class="fas fa-2x fa-shopping-basket"></i>
                                                </span>
                                                <h5 class="subtitle is-5">Total Sales<br><b>1,981,865</b></h5>
                                            </span>
                                        </div>

                                        <div class="column">
                                            <span class="icon-text">
                                                <span class="icon is-large has-text-link">
                                                    <i class="fas fa-2x fa-shopping-basket"></i>
                                                </span>
                                                <h5 class="subtitle is-5">Total Profit<br><b>1,981,865</b></h5>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="columns">
                                        <div class="column">
                                            <span class="icon-text">
                                                <span class="icon is-large has-text-success">
                                                    <i class="fas fa-2x fa-shopping-basket"></i>
                                                </span>
                                                <h5 class="subtitle is-5">Daily Sales<br><b>1,981,865</b></h5>
                                            </span>
                                        </div>

                                        <div class="column">
                                            <span class="icon-text">
                                                <span class="icon is-large has-text-success">
                                                    <i class="fas fa-2x fa-shopping-basket"></i>
                                                </span>
                                                <h5 class="subtitle is-5">Daily Profit<br><b>1,981,865</b></h5>
                                            </span>
                                        </div>
                                    </div>

                                </section>
                            </div>
                        </div>
                        <div class="nigger cell is-col-span-1">
                            <div class="box">
                                <span class="has-text-weight-bold">
                                    Purchase Overview
                                </span>
                            </div>
                        </div>
                        <div class="nigger cell is-col-span-2">
                            <div class="box">
                                <span class="has-text-weight-bold">
                                    Total Product Sold
                                </span>
                                <div class="scrollable-table">
                                    <table class="table is-fullwidth">
                                        <thead>
                                            <tr>
                                                <td>ID</td>
                                                <td>Name</td>
                                                <td>Price</td>
                                                <td>Sold</td>
                                                <td>Earning</td>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱96,564</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱96,564</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱96,564</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱96,564</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱96,564</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱96,564</td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">₱96,564</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="niggus cell is-col-span-3">
                            <div class="box">
                                <span class="has-text-weight-bold">
                                    Total Item Solds
                                </span>
                            </div>
                        </div>
                        <div class="niggus cell is-col-span-2">
                            <div class="box">
                                <span class="has-text-weight-bold">
                                    Top Revenue
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>