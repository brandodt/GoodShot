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
            height: 40vh;
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
            max-height: 35vh;
            overflow-y: auto;
        }

        .nice:hover {
            color: #AC7DE8 !important;
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="fixed-grid has-7-cols">
        <div class="grid">
            <div class="cell nigga">
                <aside class="menu has-background-grey-light px-4 py-6">
                    <ul class="menu-list is-primary flex-column">
                        <li class="py-2"><a class="has-background-primary has-text-white">Dashboard</a></li>
                        <li class="py-2"><a class="has-background-grey-light has-text-white nice">Sales Management</a>
                        </li>
                        <li class="py-2"><a class="has-background-grey-light has-text-white nice">Inventory</a></li>
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
                                <section class="section">
                                    <br>
                                    <div class="columns has-text-centered">
                                        <div class="column has-text-centered">
                                            <span
                                                class="icon-text is-flex is-flex-direction-column is-align-items-center">
                                                <span class="icon has-text-link has-text-centered is-centered">
                                                    <i class="fas fa-2x fa-shopping-basket"></i>
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
                                                <span class="icon has-text-success">
                                                    <i class="fas fa-2x fa-shopping-basket"></i>
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

        <script>
            var abc = document.getElementById('orderChart').getContext('2d');
            var orderChart = new Chart(abc, {
                type: 'line',
                data: {
                    labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
                    datasets: [{
                        label: 'Orders Shipped',
                        data: [13, 19, 9, 13, 6, 3, 7],
                        borderColor: "rgba(26, 100, 156, 1)",
                        fill: false,
                        tension: 0 // No curvature
                    }, {
                        label: 'Orders Placed',
                        data: [5, 29, 5, 5, 2, 3, 10],
                        borderColor: "rgba(71, 175, 225, 1)",
                        fill: false,
                        tension: 0 // No curvature
                    }]
                }
            });

            var def = document.getElementById("ticketChart").getContext('2d');
            var ticketChart = new Chart(def, {
                type: 'bar',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                    datasets: [{
                        label: 'Important Metric',
                        data: [169, 174, 195, 187, 140, 150, 189, 210, 175, 150, 193, 139],
                        backgroundColor: [
                            'rgba(26, 100, 156,0.6)',
                            'rgba(71, 175, 225,0.4)',
                            'rgba(26, 100, 156,0.6)',
                            'rgba(71, 175, 225,0.4)',
                            'rgba(26, 100, 156,0.6)',
                            'rgba(71, 175, 225,0.4)',
                            'rgba(26, 100, 156,0.6)',
                            'rgba(71, 175, 225,0.4)',
                            'rgba(26, 100, 156,0.6)',
                            'rgba(71, 175, 225,0.4)',
                            'rgba(26, 100, 156,0.6)',
                            'rgba(71, 175, 225,0.4)'
                        ]
                    }]
                },
                options: {
                    indexAxis: 'y' // Make the bars horizontal
                }
            });
        </script>
</body>

</html>