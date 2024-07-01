<?php
session_start();

if (!isset($_SESSION["username"]) || $_SESSION["role"] !== "cashier") {
    $_SESSION["error"] = "Unauthorized access. Please login first.";
    header("location: ../index.php");
    exit;
}

include '../includes/db/connection.php';
$db = new Database();
$conn = $db->connect();

// Pagination setup


// Get total records
$sql_total = "SELECT COUNT(*) FROM sales";
$result_total = $conn->query($sql_total);


// Fetch paginated results
$sql = "SELECT s.transactNo, s.sale_date, CONCAT(u.firstName, ' ', u.lastName) AS cashierName, SUM(s.total_amount) AS total_amount 
        FROM sales s 
        JOIN users u ON s.cashier_id = u.id
        GROUP BY s.transactNo, s.sale_date, u.firstName, u.lastName
        ORDER BY s.transactNo DESC";
$result = $conn->query($sql);
?>

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
    <script src="https://unpkg.com/vue@latest"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/sortable.js"></script>
    <style>
        .container-table {
            display: grid;
            height: 43vh;
        }

        .scrollable-table {
            height: 79vh;
            max-height: 80vh;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="section">
            <div class="columns">
                <div class="column is-2">
                    <aside class="menu">
                        <p class="lego has-text-primary is-size-1">GOODSHOT</p>
                        <p class="menu-label has-text-white">Overview</p>
                        <ul class="menu-list">
                            <li class="pt-2"><a href="index.php" class="has-background-grey-light has-text-white">Dashboard</a></li>
                            <li class="pt-2"><a href="sales-mgmt.php" class="has-background-grey-light has-text-white">Sales Management</a></li>
                        </ul>
                        <hr>
                        <p class="menu-label has-text-white">Storage</p>
                        <ul class="menu-list">
                            <li class="pt-2">
                                <a href="inventory.php" class="has-background-grey-light has-text-white">Inventory</a>
                                <ul>
                                    <li class="py-2"><a href="product.php" class="has-background-grey-light has-text-white">Product</a></li>
                                    <li class="py-2"><a href="category.php" class="has-background-grey-light has-text-white">Category</a></li>
                                </ul>
                            </li>
                            <li class="pt-2"><a href="#" class="has-background-primary has-text-white">Report</a></li>
                        </ul>
                        <hr>
                        <p class="menu-label has-text-white">Account</p>
                        <ul class="menu-list">
                            <li class="pb-2"><a href="settings.php" class="has-background-grey-light has-text-white">Settings</a></li>
                            <li class="py-2"><a class="has-background-grey-light has-text-white" onclick="logout()">Logout</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="column is-10">
                    <h1 class="title has-text-white">Sales Report</h1>
                    <div class="columns">
                        <div class="column is-12">
                            <div class="box">
                                <div class="scrollable-table">
                                    <table class="table is-fullwidth">
                                        <thead>
                                            <tr>
                                                <th>Transaction #</th>
                                                <th>Date</th>
                                                <th>Cashier Name</th>
                                                <th>Total Amount</th>
                                                <th>Action(s)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = $result->fetch_assoc()) : ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($row['transactNo']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['sale_date']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['cashierName']); ?></td>
                                                    <td>₱<?php echo htmlspecialchars($row['total_amount']); ?></td>
                                                    <td>
                                                        <button class='button is-primary is-small is-outlined' onclick='viewReceipt("<?php echo htmlspecialchars($row['transactNo']); ?>")'>View Receipt</button>
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
        function viewReceipt(transactionNum) {
            const pdfUrl = `../includes/receipts/${transactionNum}.pdf`;
            window.open(pdfUrl, "_blank");
        }
    </script>
</body>

</html>