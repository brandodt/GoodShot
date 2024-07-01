<?php
include "../includes/db/connection.php";
$db = new Database();
$conn = $db->connect();

// Total Sales
$totalSalesQuery = "SELECT SUM(total_amount) AS total_sales FROM sales";
$totalSalesResult = $conn->query($totalSalesQuery);
$totalSales = $totalSalesResult->fetch_assoc()['total_sales'];

// Total Profit
$totalProfitQuery = "SELECT SUM(s.total_amount - (p.cost * s.quantity_sold)) AS total_profit
                     FROM sales s
                     JOIN products p ON s.product_id = p.product_id";
$totalProfitResult = $conn->query($totalProfitQuery);
$totalProfitRow = $totalProfitResult->fetch_assoc();
$totalProfit = $totalProfitRow['total_profit'] ?? 0; // Set to 0 if null

//Daily Sales
$dailySalesQuery = "SELECT AVG(daily_sales) AS avg_daily_sales
                FROM (
                SELECT DATE(sale_date) AS date, SUM(total_amount) AS daily_sales
                FROM sales
                GROUP BY DATE(sale_date)
                ) AS daily_totals;";
$dailySalesResult = $conn->query($dailySalesQuery);
$dailySales = $dailySalesResult->fetch_assoc()['avg_daily_sales'] ?? 0;

// Average Daily Profit
$dailyProfitQuery = "SELECT SUM(s.total_amount - (p.cost * s.quantity_sold)) AS daily_profit
                    FROM sales s
                    JOIN products p ON s.product_id = p.product_id
                    GROUP BY DATE(sale_date)
                    ORDER BY DATE(sale_date)
                    DESC LIMIT 1";
$dailyProfitResult = $conn->query($dailyProfitQuery);
$dailyProfit = $dailyProfitResult->fetch_assoc()['daily_profit'] ?? 0; // Set to 0 if null

// No. Of Purchases
$purchasesQuery = "SELECT COUNT(*) AS number_of_purchases FROM sales";
$purchasesResult = $conn->query($purchasesQuery);
$numberOfPurchases = $purchasesResult->fetch_assoc()['number_of_purchases'];

// Average Sold Amount
$avgSoldAmountQuery = "SELECT SUM(total_amount / quantity_sold) AS avg_sold_amount 
                    FROM sales";
$avgSoldAmountResult = $conn->query($avgSoldAmountQuery);
$avgSoldAmount = $avgSoldAmountResult->fetch_assoc()['avg_sold_amount'];

// Top Products
$topProduct = "SELECT p.product_id AS ID, 
                 p.name AS Name, 
                 p.price AS Price, 
                 SUM(s.quantity_sold) AS Sold, 
                 SUM(s.total_amount) AS Earning
          FROM sales s
          JOIN products p ON s.product_id = p.product_id
          GROUP BY p.product_id, p.name, p.price
          ORDER BY SUM(s.quantity_sold) DESC
          LIMIT 10";
$topProductResult = $conn->query($topProduct);


$conn->close();
?>

<!DOCTYPE html>
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
    <style>
        .nigger {
            display: grid;
            height: 46vh;
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

        .scrollable-table {
            max-height: 38vh;
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
                        <li class="pt-2"><a href="#" class="has-background-primary has-text-white">Dashboard</a></li>
                        <li class="pt-2"><a href="sales-mgmt.php" class="has-background-grey-light has-text-white nice">Sales Management</a></li>
                    </ul>
                    <hr>
                    <p class="menu-label has-text-white">Storage</p>
                    <ul class="menu-list">
                        <li class="pt-2">
                            <a href="inventory.php" class="has-background-grey-light has-text-white nice">Inventory</a>
                            <ul>
                                <li class="py-2"><a href="product.php" class="has-background-grey-light has-text-white nice">Product</a>
                                </li>
                                <li class="py-2"><a href="category.php" class="has-background-grey-light has-text-white nice">Category</a>
                                </li>
                            </ul>
                        </li>
                        <li class="pt-2"><a href="report.php" class="has-background-grey-light has-text-white nice">Report</a></li>
                    </ul>
                    <hr>
                    <p class="menu-label has-text-white">Account</p>
                    <ul class="menu-list">
                        <li class="pb-2"><a href="settings.php" class="has-background-grey-light has-text-white nice">Settings</a></li>
                        <li class="py-2"><a class="has-background-grey-light has-text-white nice" onclick="logout()">Logout</a></li>
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
                                                <h5 class="subtitle is-5">Total Sales<br><b>₱
                                                        <?php echo number_format($totalSales, 2); ?>
                                                    </b></h5>
                                            </span>
                                        </div>

                                        <div class="column">
                                            <span class="icon-text">
                                                <span class="icon is-large has-text-link">
                                                    <i class="fas fa-2x fa-money-bill-wave"></i>
                                                </span>
                                                <h5 class="subtitle is-5">Total Profit<br><b>₱
                                                        <?php echo number_format($totalProfit, 2); ?>
                                                    </b></h5>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="columns">
                                        <div class="column">
                                            <span class="icon-text">
                                                <span class="icon is-large has-text-primary">
                                                    <i class="fas fa-2x fa-shopping-basket"></i>
                                                </span>
                                                <h5 class="subtitle is-5">Daily Sales<br><b>₱
                                                        <?php echo number_format($dailySales, 2); ?>
                                                    </b></h5>
                                            </span>
                                        </div>

                                        <div class="column">
                                            <span class="icon-text">
                                                <span class="icon is-large has-text-primary">
                                                    <i class="fas fa-2x fa-money-check-alt"></i>
                                                </span>
                                                <h5 class="subtitle is-5">Daily Profit<br><b>₱
                                                        <?php echo number_format($dailyProfit, 2); ?>
                                                    </b></h5>
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
                                            <span class="icon-text is-flex is-flex-direction-column is-align-items-center">
                                                <span class="icon has-text-link has-text-centered is-centered">
                                                    <i class="fas fa-2x fa-hand-holding-usd"></i>
                                                </span>
                                                <h5 class="subtitle is-6">No. of Purchases<br></h5><span class="title is-4">
                                                    <?php echo $numberOfPurchases; ?>
                                                </span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="columns has-text-centered">
                                        <div class="column has-text-centered">
                                            <span class="icon-text is-flex is-flex-direction-column is-align-items-center">
                                                <span class="icon has-text-primary">
                                                    <i class="fas fa-2x fa-dollar-sign"></i>
                                                </span>
                                                <h5 class="subtitle is-6">Avg Sale Amount<br></h5><span class="title is-4">₱
                                                    <?php echo number_format($avgSoldAmount, 2); ?>
                                                </span>
                                            </span>
                                        </div>
                                    </div>

                                </section>
                            </div>
                        </div>
                        <div class="nigger cell is-col-span-2">
                            <div class="box">
                                <span class="has-text-weight-bold">
                                    Top Product Sold
                                </span>
                                <div class="scrollable-table">
                                    <table class="table is-narrow">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Sold</th>
                                                <th>Earning</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = $topProductResult->fetch_assoc()) : ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row['ID']; ?>
                                                    </td>
                                                    <td class="">
                                                        <?php echo $row['Name']; ?>
                                                    </td>
                                                    <td class="">₱<?php echo number_format($row['Price']); ?>
                                                    </td>
                                                    <td class="">
                                                        <?php echo $row['Sold']; ?>
                                                    </td>
                                                    <td class="has-text-weight-semibold has-text-success">₱<?php echo number_format($row['Earning']); ?>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
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
        // Function to fetch data and update both charts
        function updateChartsWithData() {
            fetch('../../includes/api/admin/getChartData.php')
                .then(response => response.json())
                .then(data => {
                    // Update Total Item Sold chart
                    orderChart.data.labels = data.totalSoldLabels;
                    orderChart.data.datasets[0].data = data.totalSoldValues;
                    orderChart.update();

                    // Update Top Revenue chart
                    ticketChart.data.labels = data.topRevenueLabels;
                    ticketChart.data.datasets[0].data = data.topRevenueValues;
                    ticketChart.update();
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        // Initialize Total Item Sold chart
        var orderCtx = document.getElementById("orderChart").getContext("2d");
        var orderChart = new Chart(orderCtx, {
            type: "line",
            data: {
                labels: [], // Initially empty labels (to be populated dynamically)
                datasets: [{
                    label: "Total Item Sold",
                    data: [], // Initially empty data array (to be populated dynamically)
                    borderColor: "rgba(172, 125, 232)",
                    backgroundColor: "rgba(172, 125, 232, 0.4)",
                    fill: false,
                    tension: 0.1, // No curvature
                    borderWidth: 5,
                }],
            },
        });

        // Initialize Top Revenue chart
        var ticketCtx = document.getElementById("ticketChart").getContext("2d");
        var ticketChart = new Chart(ticketCtx, {
            type: "line",
            data: {
                labels: [], // Initially empty labels (to be populated dynamically)
                datasets: [{
                    label: "Total Revenue",
                    data: [], // Initially empty data array (to be populated dynamically)
                    borderColor: "rgba(172, 125, 232)",
                    backgroundColor: "rgba(172, 125, 232, 0.4)",
                    tension: 0.1,
                    borderWidth: 5,
                }],
            },
            options: {
                scales: {
                    y: {
                        ticks: {
                            callback: function(value, index, values) {
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

        // Call the function to initially update both charts with real data
        updateChartsWithData();
    </script>
</body>

</html>