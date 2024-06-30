<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sales Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bulma/bulma.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/js/main.js"></script>
    <style>
        .icon-text-stack {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        canvas#barChart {
            /* Make the canvas responsive */
            width: 100% !important;
            height: 53vh !important;
            max-height: 100vh;
            /* Prevent it from getting too tall */
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
                                class="has-background-grey-light has-text-white nice">Dashboard</a></li>
                        <li class="pt-2"><a href="#" class="has-background-primary has-text-white">Sales
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
                <h1 class="title has-text-white">Sales Overview</h1>
                <div class="fixed-grid has-7-cols">
                    <div class="grid">
                        <div class=" cell" style="height: 20vh;">
                            <div class="icon-text-stack box">
                                <span class="fa-stack fa-2x has-text-primary">
                                    <i class="far fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-coins fa-stack-1x"></i>
                                </span>
                                <br>
                                <h5 class="subtitle is-6">Total Sales<br><br></h5>
                                <span class="title is-4">₱32,400</span>
                            </div>
                        </div>
                        <div class=" cell" style="height: 20vh;">
                            <div class="icon-text-stack box">
                                <span class="fa-stack fa-2x has-text-primary">
                                    <i class="far fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-chart-line fa-stack-1x"></i>
                                </span>
                                <br>
                                <h5 class="subtitle is-6">Revenue<br><br></h5>
                                <span class="title is-4">₱32,400</span>
                            </div>
                        </div>
                        <div class=" cell" style="height: 20vh;">
                            <div class="icon-text-stack box">
                                <span class="fa-stack fa-2x has-text-primary">
                                    <i class="far fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-dollar-sign fa-stack-1x"></i>
                                </span>
                                <br>
                                <h5 class="subtitle is-6">Daily Sales<br><br></h5>
                                <span class="title is-4">₱32,400</span>
                            </div>
                        </div>
                        <div class=" cell" style="height: 20vh;">
                            <div class="icon-text-stack box">
                                <span class="fa-stack fa-2x has-text-primary">
                                    <i class="far fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-money-bill-wave fa-stack-1x"></i>
                                </span>
                                <br>
                                <h5 class="subtitle is-6">Daily Revenue<br><br></h5>
                                <span class="title is-4">₱32,400</span>
                            </div>
                        </div>
                        <div class="cell is-col-span-3 is-row-span-12" style="height: 65vh;">
                            <div class="box">
                                <span class="has-text-weight-bold">
                                    Total Sales
                                </span>
                                <br>
                                <br>
                                <span class="title is-4">₱483,900</span>
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                        <div class=" cell is-col-span-4 is-row-span-11">
                            <div class="box">
                                <span class="has-text-weight-bold has-text-success">
                                    Top Selling Products
                                </span>
                                <div class="scrollable-table">
                                    <table class="table is-fullwidth">
                                        <thead>
                                            <tr>
                                                <td>ID</td>
                                                <td>Name</td>
                                                <td>Price</td>
                                                <td>Sold Qty</td>
                                                <td>Stock</td>
                                                <td>Status</td>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                            <td><span class="tag is-success">In Stock</span></td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                            <td><span class="tag is-success">In Stock</span></td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                            <td><span class="tag is-success">In Stock</span></td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                            <td><span class="tag is-danger">Out of Stock</span></td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                            <td><span class="tag is-success">In Stock</span></td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                            <td><span class="tag is-success">In Stock</span></td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">0</td>
                                            <td><span class="tag is-danger">Out of Stock</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class=" cell is-col-span-3" style="height: 40vh;">
                            <div class="box">
                                <span class="has-text-weight-bold">
                                    Sales Per Category
                                </span>
                                <canvas id="doughnutChart" style="margin: 5vh;"></canvas>
                            </div>
                        </div>
                        <div class=" cell is-col-span-4" style="height: 40vh;">
                            <div class="box">
                                <span class="has-text-weight-bold has-text-danger">
                                    Least Selling Products
                                </span>
                                <div class="scrollable-table">
                                    <table class="table is-fullwidth">
                                        <thead>
                                            <tr>
                                                <td>ID</td>
                                                <td>Name</td>
                                                <td>Price</td>
                                                <td>Sold Qty</td>
                                                <td>Stock</td>
                                                <td>Status</td>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                            <td><span class="tag is-success">In Stock</span></td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                            <td><span class="tag is-success">In Stock</span></td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                            <td><span class="tag is-success">In Stock</span></td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                            <td><span class="tag is-danger">Out of Stock</span></td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                            <td><span class="tag is-success">In Stock</span></td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">300</td>
                                            <td><span class="tag is-success">In Stock</span></td>
                                        </tr>
                                        <tr>
                                            <td>10010</td>
                                            <td class="has-text-weight-semibold">Tubol</td>
                                            <td class="has-text-weight-semibold">₱600</td>
                                            <td class="has-text-weight-semibold">421</td>
                                            <td class="has-text-weight-semibold">0</td>
                                            <td><span class="tag is-danger">Out of Stock</span></td>
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
    <script>
        var ghi = document.getElementById("barChart").getContext("2d");
        var barChart = new Chart(ghi, {
            type: "bar",
            data: {
                labels: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                datasets: [
                    {
                        label: "Weekly Revenue",
                        data: [110000, 140000, 60000, 80000, 100000, 90000, 110000],
                        borderColor: "rgba(76, 76, 76)",
                        backgroundColor: "rgba(172, 125, 232)",
                        borderWidth: 2,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            color: 'black'
                        }
                    },
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: 'black'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function (value, index, values) {
                                if (value >= 1000) {
                                    return "₱" + value / 1000 + "k";
                                }
                                return "₱" + value;
                            },
                            color: 'black'
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        }
                    },
                },
            },
        });

        var ctx = document.getElementById("doughnutChart").getContext("2d");
        var doughnutChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: ["Category 1", "Category 2", "Category 3"],
                datasets: [{
                    data: [21097, 18997, 55743],
                    backgroundColor: [
                        "rgba(92, 255, 176, 0.8)",
                        "rgba(130, 82, 255, 0.8)",
                        "rgba(255, 76, 99, 0.8)"
                    ],
                    borderColor: [
                        "rgba(92, 255, 176, 1)",
                        "rgba(130, 82, 255, 1)",
                        "rgba(255, 76, 99, 1)"
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'right',
                        labels: {
                            color: 'black'
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' Sold';
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>