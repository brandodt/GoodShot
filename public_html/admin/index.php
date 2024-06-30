<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bulma/bulma.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        html,
        body {
            background-color: #4c4c4c;
        }

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

        .column.is-2 {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            height: 100%;
            /* Ensure it spans the full viewport height */
            /* Allow scrolling if content overflows */
            background-color: #4c4c4c;
        }

        .is-10 {
            overflow-y: auto;

        }

        .nice:hover {
            color: #ac7de8 !important;
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
                        <li class="pt-2"><a href="#" class="has-background-primary has-text-white">Dashboard</a></li>
                        <li class="pt-2"><a href="sales-mgmt.php"
                                class="has-background-grey-light has-text-white nice">Sales Management</a></li>
                    </ul>
                    <hr>
                    <p class="menu-label has-text-white">Storage</p>
                    <ul class="menu-list">
                        <li class="pt-2">
                            <a class="has-background-grey-light has-text-white nice">Inventory</a>
                            <ul>
                                <li class="py-2"><a class="has-background-grey-light has-text-white nice">Product</a>
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
                <h1 class="title has-text-white">Dashboard</h1>
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
    </div>
    <script>
        var abc = document.getElementById("orderChart").getContext("2d");
        var orderChart = new Chart(abc, {
            type: "line",
            data: {
                labels: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                datasets: [
                    {
                        label: "Total Item Sold",
                        data: [0, 9, 19, 14, 19, 34, 36, 37],
                        borderColor: "rgba(172, 125, 232)",
                        backgroundColor: "rgba(172, 125, 232, 0.4)",
                        fill: false,
                        tension: 0.1, // No curvature
                        borderWidth: 5,
                    },
                ],
            },
        });

        var def = document.getElementById("ticketChart").getContext("2d");
        var ticketChart = new Chart(def, {
            type: "line",
            data: {
                labels: ["0", "5", "10", "15", "20", "25", "30"],
                datasets: [
                    {
                        label: "Total Revenue",
                        data: [0, 499000, 210000, 510000, 220000, 585000, 685000],
                        borderColor: "rgba(172, 125, 232)",
                        backgroundColor: "rgba(172, 125, 232, 0.4)",
                        tension: 0.1,
                        borderWidth: 5,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        ticks: {
                            callback: function (value, index, values) {
                                if (value >= 1000) {
                                    return value / 1000 + "k";
                                }
                                return value;
                            },
                        },
                    },
                },
            },
        });
    </script>
</body>

</html>