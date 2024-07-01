<?php
include '../includes/db/connection.php';
$db = new Database();
$conn = $db->connect();

// Categories
$category = "SELECT category_id, category_name FROM category";
$categoryResult = $conn->query($category);

// Total Items per Category
$totalItemsQuery = "SELECT c.category_id, COUNT(p.product_id) AS total_items
                    FROM products p 
                    JOIN category c ON p.category_id = c.category_id 
                    GROUP BY c.category_id";
$totalItemsResult = $conn->query($totalItemsQuery);

// Create an associative array for total items per category
$totalItems = [];
while ($row = $totalItemsResult->fetch_assoc()) {
    $totalItems[$row['category_id']] = $row['total_items'];
}

$conn->close();
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
    <script src="assets/js/main.js"></script>
    <script src="assets/js/sortable.js"></script>
    <script src="https://unpkg.com/vue@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        .scrollable-table {
            height: 75vh;
            max-height: 80vh;
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
                        <li class="pt-2"><a href="index.php" class="has-background-grey-light has-text-white nice">Dashboard</a></li>
                        <li class="pt-2"><a href="sales-mgmt.php" class="has-background-grey-light has-text-white nice">Sales Management</a></li>
                    </ul>
                    <hr>
                    <p class="menu-label has-text-white">Storage</p>
                    <ul class="menu-list">
                        <li class="pt-2">
                            <a href="inventory.php" class="has-background-grey-light has-text-white nice">Inventory</a>
                            <ul>
                                <li class="py-2"><a href="product.php" class="has-background-grey-light has-text-white nice">Product</a></li>
                                <li class="py-2"><a href="#" class="has-background-primary has-text-white">Category</a>
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
                <div class="columns">
                    <div class="column is-10">
                        <h3 class="title has-text-white">Category</h3>
                    </div>
                    <div class="column">
                        <div class="buttons is-right">
                            <button class="button is-primary"><span class="icon"><i class="fas fa-plus"></i></span>
                                <span>Add Category</span></button>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-12">
                        <div class="box">
                            <div class="scrollable-table">
                                <table class="table is-fullwidth">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Total Items</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $categoryResult->fetch_assoc()) : ?>
                                            <tr>
                                                <td class="has-text-weight-semibold"><?php echo $row['category_id']; ?></td>
                                                <td><?php echo $row['category_name']; ?></td>
                                                <td><?php echo $totalItems[$row['category_id']] ?? 0; ?></td>
                                                <td>
                                                    <div class="buttons are-small">
                                                        <button class="button is-small is-success is-light is-responsive">Update</button>
                                                        <button class="button is-small is-danger is-light is-responsive">Delete</button>
                                                    </div>
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
</body>

</html>