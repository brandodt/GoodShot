<?php
session_start();

if (!isset($_SESSION["username"]) || $_SESSION["role"] !== "admin") {
    $_SESSION["error"] = "Unauthorized access. Please login first.";
    header("location: ../index.php");
    exit;
}
include '../includes/db/connection.php';
$db = new Database();
$conn = $db->connect();

// Total Sales
$totalSalesQuery = "SELECT SUM(total_amount) AS total_sales FROM sales";
$totalSalesResult = $conn->query($totalSalesQuery);
$totalSales = $totalSalesResult->fetch_assoc()['total_sales'];

//Daily Sales
$dailySalesQuery = "SELECT AVG(daily_sales) AS avg_daily_sales
                       FROM (
                           SELECT DATE(sale_date) AS date, SUM(total_amount) AS daily_sales
                           FROM sales
                           GROUP BY DATE(sale_date)
                       ) AS daily_totals";
$dailySalesResult = $conn->query($dailySalesQuery);
$dailySales = $dailySalesResult->fetch_assoc()['avg_daily_sales'] ?? 0;

// Revenue
$revenueQuery = "SELECT SUM(total_amount) AS revenue FROM sales";
$revenueResult = $conn->query($revenueQuery);
$revenue = $revenueResult->fetch_assoc()['revenue'];

// Daily Revenue
$dailyRevenueQuery = "SELECT DATE(sale_date) AS date, SUM(total_amount) AS daily_revenue
                      FROM sales
                      GROUP BY DATE(sale_date)
                      ORDER BY DATE(sale_date)";
$dailyRevenueResult = $conn->query($dailyRevenueQuery);

// Top Selling Products
$topProduct = "SELECT p.product_id AS ID, 
                 p.name AS Name, 
                 p.price AS Price, 
                 SUM(s.quantity_sold) AS SoldQty, 
                 p.quantity AS Stock
          FROM sales s
          JOIN products p ON s.product_id = p.product_id
          GROUP BY p.product_id, p.name, p.price, p.quantity
          ORDER BY SUM(s.quantity_sold) DESC
          LIMIT 10";
$topProductResult = $conn->query($topProduct);

// Least Selling Products
$leastProduct = "SELECT p.product_id AS ID, 
                 p.name AS Name, 
                 p.price AS Price, 
                 SUM(s.quantity_sold) AS SoldQty, 
                 p.quantity AS Stock
          FROM sales s
          JOIN products p ON s.product_id = p.product_id
          GROUP BY p.product_id, p.name, p.price, p.quantity
          ORDER BY SUM(s.quantity_sold) ASC
          LIMIT 10";
$leastProductResult = $conn->query($leastProduct);

// Average Sold Value
// No. Of Unique Transactions
$transactionsQuery = "SELECT COUNT(DISTINCT transactNo) AS number_of_transactions FROM sales";
$transactionsResult = $conn->query($transactionsQuery);
$numberOfTransactions = $transactionsResult->fetch_assoc()['number_of_transactions'];

// Average Sale Value
$averageSaleValue = $totalSales / $numberOfTransactions;


// Total Items Sold
$totalItemsSoldQuery = "SELECT SUM(quantity_sold) AS total_items_sold FROM sales";
$totalItemsSoldResult = $conn->query($totalItemsSoldQuery);
$totalItemsSold = $totalItemsSoldResult->fetch_assoc()['total_items_sold'];

// Current Month Sales
$currentMonthSalesQuery = "SELECT SUM(total_amount) AS current_month_sales
                           FROM sales
                           WHERE MONTH(sale_date) = MONTH(CURRENT_DATE)
                           AND YEAR(sale_date) = YEAR(CURRENT_DATE)";
$currentMonthSalesResult = $conn->query($currentMonthSalesQuery);
$currentMonthSales = $currentMonthSalesResult->fetch_assoc()['current_month_sales'];

// Previous Month Sales
$previousMonthSalesQuery = "SELECT SUM(total_amount) AS previous_month_sales
                            FROM sales
                            WHERE MONTH(sale_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
                            AND YEAR(sale_date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)";
$previousMonthSalesResult = $conn->query($previousMonthSalesQuery);
$previousMonthSales = $previousMonthSalesResult->fetch_assoc()['previous_month_sales'];

// Calculate Sales Growth Rate
if ($previousMonthSales > 0) {
    $salesGrowthRate = (($currentMonthSales - $previousMonthSales) / $previousMonthSales) * 100;
} else {
    $salesGrowthRate = 0; // To handle division by zero
}

$conn->close();
?>

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
                    <p class="lego has-text-primary is-size-1">GOODSHOT</p>
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
                                <li class="pt-2"><a href="report.php"
                                        class="has-background-grey-light has-text-white nice">Report</a></li>
                                <!-- <li class="py-2"><a href="category.php" class="has-background-grey-light has-text-white nice">Category</a>
                                </li> -->
                            </ul>
                        </li>
                    </ul>
                    <hr>
                    <p class="menu-label has-text-white">Account</p>
                    <ul class="menu-list">
                        <!-- <li class="pb-2"><a href="settings.php"
                                class="has-background-grey-light has-text-white nice">Settings</a></li> -->
                        <li class="py-2"><a class="has-background-grey-light has-text-white nice"
                                onclick="logout()">Logout</a></li>
                    </ul>
                </aside>
            </div>
            <div class="column is-10">
                <h1 class="title has-text-white">Sales Overview</h1>
                <div class="fixed-grid has-7-cols">
                    <div class="grid">
                        <div class="cell" style="height: 20vh;">
                            <div class="icon-text-stack box">
                                <span class="fa-stack fa-2x has-text-primary">
                                    <i class="far fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-coins fa-stack-1x"></i>
                                </span>
                                <br>
                                <h5 class="subtitle is-6">Total Sales<br><br></h5>
                                <span class="title is-4"
                                    id="counter">₱<?php echo number_format($totalSales, 2); ?></span>
                            </div>
                        </div>
                        <div class="cell" style="height: 20vh;">
                            <div class="icon-text-stack box">
                                <span class="fa-stack fa-2x has-text-primary">
                                    <i class="far fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-chart-line fa-stack-1x"></i>
                                </span>
                                <br>
                                <h5 class="subtitle is-6">Total Items Sold<br></h5>
                                <span class="numeric-value title is-4"><?php echo $totalItemsSold; ?></span>
                            </div>
                        </div>
                        <div class="cell" style="height: 20vh;">
                            <div class="icon-text-stack box">
                                <span class="fa-stack fa-2x has-text-primary">
                                    <i class="far fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-dollar-sign fa-stack-1x"></i>
                                </span>
                                <br>
                                <h5 class="subtitle is-6">Sales Growth Rate<br></h5>
                                <span
                                    class="numeric-value title is-4"><?php echo number_format($salesGrowthRate, 2); ?>%</span>
                            </div>
                        </div>
                        <div class="cell" style="height: 20vh;">
                            <div class="icon-text-stack box">
                                <span class="fa-stack fa-2x has-text-primary">
                                    <i class="far fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-money-bill-wave fa-stack-1x"></i>
                                </span>
                                <br>
                                <h5 class="subtitle is-6">Avg Sale Value<br><br></h5>
                                <span
                                    class="numeric-value title is-4">₱<?php echo number_format($averageSaleValue, 2); ?></span>
                            </div>
                        </div>
                        <div class="cell is-col-span-3 is-row-span-12" style="height: 65vh;">
                            <div class="box">
                                <span class="has-text-weight-bold">
                                    Total Sales
                                </span>
                                <br>
                                <br>
                                <span class="title is-4">₱<?php echo number_format($totalSales, 2); ?></span>
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
                                        <tbody>
                                            <?php while ($row = $topProductResult->fetch_assoc()): ?>
                                                <tr>
                                                    <td class="has-text-weight-semibold"><?php echo $row['ID']; ?></td>
                                                    <td class=""><?php echo $row['Name']; ?></td>
                                                    <td class="">₱<?php echo number_format($row['Price'], 2); ?></td>
                                                    <td class=""><?php echo $row['SoldQty']; ?></td>
                                                    <td class=""><?php echo $row['Stock']; ?></td>
                                                    <td>
                                                        <span
                                                            class="tag <?php echo $row['Stock'] > 0 ? 'is-success' : 'is-danger'; ?>">
                                                            <?php echo $row['Stock'] > 0 ? 'In Stock' : 'Out of Stock'; ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
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
                                        <tbody>
                                            <?php while ($row = $leastProductResult->fetch_assoc()): ?>
                                                <tr>
                                                    <td><?php echo $row['ID']; ?></td>
                                                    <td class="has-text-weight-semibold"><?php echo $row['Name']; ?></td>
                                                    <td class="has-text-weight-semibold">
                                                        ₱<?php echo number_format($row['Price'], 2); ?></td>
                                                    <td class="has-text-weight-semibold"><?php echo $row['SoldQty']; ?></td>
                                                    <td class="has-text-weight-semibold"><?php echo $row['Stock']; ?></td>
                                                    <td>
                                                        <span
                                                            class="tag <?php echo $row['Stock'] > 0 ? 'is-success' : 'is-danger'; ?>">
                                                            <?php echo $row['Stock'] > 0 ? 'In Stock' : 'Out of Stock'; ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
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
        // Function to fetch data and update barChart
        function updateBarChartWithData() {
            fetch('../../includes/api/admin/getBarChartData.php')
                .then(response => response.json())
                .then(data => {
                    var ctx = document.getElementById("barChart").getContext("2d");
                    var barChart = new Chart(ctx, {
                        type: "bar",
                        data: {
                            labels: data.weeklyRevenueLabels,
                            datasets: [{
                                label: "Weekly Revenue",
                                data: data.weeklyRevenueValues,
                                borderColor: "rgba(76, 76, 76)",
                                backgroundColor: "rgba(172, 125, 232)",
                                borderWidth: 2,
                            }],
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
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        // Call the function to initially update barChart with real data
        updateBarChartWithData();


        // Function to fetch data and update doughnutChart
        function updateDoughnutChartWithData() {
            fetch('../../includes/api/admin/getDoughnutChartData.php')
                .then(response => response.json())
                .then(data => {
                    // Define custom colors based on data length
                    var backgroundColors = [
                        "rgba(92, 255, 176, 0.8)",
                        "rgba(130, 82, 255, 0.8)",
                        "rgba(255, 76, 99, 0.8)",
                        "rgba(255, 206, 86, 0.8)",
                        "rgba(54, 162, 235, 0.8)",
                        "rgba(75, 192, 192, 0.8)",
                        "rgba(153, 102, 255, 0.8)"
                        // Add more colors as needed
                    ];

                    var borderColors = [
                        "rgba(92, 255, 176, 1)",
                        "rgba(130, 82, 255, 1)",
                        "rgba(255, 76, 99, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)"
                        // Add corresponding border colors
                    ];

                    // Trim colors if there are more categories than colors defined
                    if (data.categoryLabels.length > backgroundColors.length) {
                        data.categoryLabels.splice(backgroundColors.length);
                        data.categoryValues.splice(backgroundColors.length);
                    }

                    var ctx = document.getElementById("doughnutChart").getContext("2d");
                    var doughnutChart = new Chart(ctx, {
                        type: "doughnut",
                        data: {
                            labels: data.categoryLabels,
                            datasets: [{
                                data: data.categoryValues,
                                backgroundColor: backgroundColors.slice(0, data.categoryLabels.length),
                                borderColor: borderColors.slice(0, data.categoryLabels.length),
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
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        // Call the function to initially update doughnutChart with real data
        updateDoughnutChartWithData();
    </script>
</body>

</html>