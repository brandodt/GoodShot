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
    <style>
        .nigger {
            display: grid;
            height: 43vh;
        }

        .niggus {
            display: grid;
            height: 40vh;
        }

        canvas#orderChart,
        canvas#ticketChart {
            /* Make the canvas responsive */
            width: 100% !important;
            height: auto !important;
            max-height: 30vh;
            /* Prevent it from getting too tall */
        }
    </style>
</head>

<body>
    <div class="fixed-grid has-7-cols">
        <div class="grid">
            <div class="cell nigga">
                <aside class="menu has-background-grey-light px-4 py-6">
                    <ul class="menu-list is-primary flex-column">
                        <li class="py-2"><a href="#" class="has-background-primary has-text-white">Dashboard</a></li>
                        <li class="py-2"><a href="sales-mgmt.php"
                                class="has-background-grey-light has-text-white nice">Sales Management</a>
                        </li>
                        <li class="py-2"><a href="invetory.php"
                                class="has-background-grey-light has-text-white nice">Inventory</a></li>
                        <li class="py-2"><a class="has-background-grey-light has-text-white nice">Product</a></li>
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
                <h1 class="title">Dashboard</h1>
                <div class="fixed-grid has-5-cols">
                    <div class="grid">
                        <div class="nigger cell is-col-span-2">
                            <div class="box">
                                <span class="has-text-weight-bold">
                                    Sales Overview
                                </span>
                                <section class="section">
                                    <br><br>
                                    <div class="columns">
                                        <div class="column">
                                            <span class="icon-text">
                                                <span class="icon is-large has-text-link">
                                                    <i class="fas fa-2x fas fa-chart-line"></i>
                                                </span>
                                                <h5 class="subtitle is-5">Total Sales<br><b>₱1,981,865</b></h5>
                                            </span>
                                        </div>

                                        <div class="column">
                                            <span class="icon-text">
                                                <span class="icon is-large has-text-link">
                                                    <i class="fas fa-2x fa-money-bill-wave"></i>
                                                </span>
                                                <h5 class="subtitle is-5">Total Profit<br><b>₱908,855</b></h5>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="columns">
                                        <div class="column">
                                            <span class="icon-text">
                                                <span class="icon is-large has-text-primary">
                                                    <i class="fas fa-2x fa-shopping-basket"></i>
                                                </span>
                                                <h5 class="subtitle is-5">Daily Sales<br><b>₱65,457</b></h5>
                                            </span>
                                        </div>

                                        <div class="column">
                                            <span class="icon-text">
                                                <span class="icon is-large has-text-primary">
                                                    <i class="fas fa-2x fa-money-check-alt"></i>
                                                </span>
                                                <h5 class="subtitle is-5">Daily Profit<br><b>₱32,600</b></h5>
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
                                <section class="section">
                                    <br>
                                    <div class="columns has-text-centered">
                                        <div class="column has-text-centered">
                                            <span
                                                class="icon-text is-flex is-flex-direction-column is-align-items-center">
                                                <span class="icon has-text-link has-text-centered is-centered">
                                                    <i class="fas fa-2x fa-hand-holding-usd"></i>
                                                </span>
                                                <h5 class="subtitle is-6">No. of Purchases<br></h5><span
                                                    class="title is-4">79</span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="columns has-text-centered">
                                        <div class="column has-text-centered">
                                            <span
                                                class="icon-text is-flex is-flex-direction-column is-align-items-center">
                                                <span class="icon has-text-primary">
                                                    <i class="fas fa-2x fa-dollar-sign"></i>
                                                </span>
                                                <h5 class="subtitle is-6">Sold Amount<br></h5><span
                                                    class="title is-4">₱68,855</span>
                                            </span>
                                        </div>
                                    </div>

                                </section>
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
                                <canvas id="orderChart"></canvas>
                            </div>
                        </div>
                        <div class="niggus cell is-col-span-2">
                            <div class="box">
                                <span class="has-text-weight-bold">
                                    Top Revenue
                                </span>
                                <canvas id="ticketChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/localChart.js"></script>
</body>

</html>