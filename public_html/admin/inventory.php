<?php
include_once '../includes/db/connection.php';
$db = new Database();
$conn = $db->connect();

// Fetch Total Products
$totalProducts = "SELECT COUNT(*) AS total_products FROM products";
$totalProductsResult = $conn->query($totalProducts);
$total_products = $totalProductsResult->fetch_assoc()['total_products'];

// Fetch Total Items Sold
$itemSold = "SELECT SUM(quantity_sold) AS total_sold FROM sales";
$itemSoldResult = $conn->query($itemSold);
$total_sold = $itemSoldResult->fetch_assoc()['total_sold'];

// Fetch Low Stock Products
$low_stock_threshold = 20;
$low_stock = "SELECT COUNT(*) AS low_stock_count FROM products WHERE quantity < ?";
$stmts = $conn->prepare($low_stock);
$stmts->bind_param("i", $low_stock_threshold);
$stmts->execute();
$lowStockResult = $stmts->get_result();
$low_stock_count = $lowStockResult->fetch_assoc()['low_stock_count'];

// Fetch Total Categories
$category = "SELECT COUNT(DISTINCT c.category_name) AS total_categories FROM products
            JOIN category c ON products.category_id = c.category_id;";
$categoryResult = $conn->query($category);
$total_categories = $categoryResult->fetch_assoc()['total_categories'];

// Fetch Low Stock Products
$low_stock_threshold = 20; // Define the threshold for low stocks
$lowStock = "SELECT product_id AS ID, 
                 name AS Product, 
                 quantity AS Stocks, 
                 price AS Price
          FROM products
          WHERE quantity < ?
          ORDER BY quantity ASC";
$stmt = $conn->prepare($lowStock);
$stmt->bind_param("i", $low_stock_threshold);
$stmt->execute();
$lowStockResult = $stmt->get_result();

// New Arrival Data
$newarrival = "SELECT name, product_id, supplier_name 
            FROM products
            JOIN suppliers ON products.supplier_id = suppliers.supplier_id
            WHERE date >= DATE_SUB(CURDATE(), INTERVAL 5 DAY);";
$newarrivalResult = $conn->query($newarrival);

// Count new products
$newproduct = "SELECT COUNT(*) AS new_products FROM products WHERE date >= DATE_SUB(CURDATE(), INTERVAL 5 DAY);";
$newproductResult = $conn->query($newproduct);

// Total Suppliers
$supplierQuery = "SELECT COUNT(*) AS total_supplier FROM suppliers;";
$supplierResult = $conn->query($supplierQuery);

if ($supplierResult) {
    $total_supplier = $supplierResult->fetch_assoc()['total_supplier'];
} else {
    $total_supplier = "N/A"; // Set a default value or error message
}

// Top Suppliers
$topSupplierQuery = "SELECT supplier_name FROM suppliers ORDER BY supplier_id DESC LIMIT 5;";
$topSupplierResult = $conn->query($topSupplierQuery);
if ($topSupplierResult) {
    $total_topSupplier = $topSupplierResult->fetch_all(MYSQLI_ASSOC);
} else {
    $total_topSupplier = "N/A"; // Set a default value or error message
}

?>

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
    <script src="assets/js/addProduct.modal.js"></script>
    <script src="assets/js/removeProduct.modal.js"></script>
    <script src="assets/js/main.js"></script>
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
            max-height: 56vh;
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
                        <li class="pt-2"><a href="index.php" class="has-background-grey-light has-text-white nice">Dashboard</a>
                        </li>
                        <li class="pt-2"><a href="sales-mgmt.php" class="has-background-grey-light has-text-white nice">Sales Management</a></li>
                    </ul>
                    <hr>
                    <p class="menu-label has-text-white">Storage</p>
                    <ul class="menu-list">
                        <li class="pt-2">
                            <a href="#" class="has-background-primary has-text-white">Inventory</a>
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
                <h1 class="title has-text-white">Inventory Overview</h1>
                <?php if (isset($_GET['message'])) : ?>
                    <div class="notification is-success has-text-weight-bold">
                        <?php echo htmlspecialchars($_GET['message']); ?>
                    </div>
                <?php endif; ?>
                <div class="fixed-grid has-7-cols">
                    <div class="grid">
                        <div class="cell" style="height: 20vh;">
                            <div class="icon-text-stack box">
                                <span class="fa-stack fa-2x has-text-link">
                                    <i class="far fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-shopping-basket fa-stack-1x"></i>
                                </span>
                                <br>
                                <h5 class="subtitle is-6">Total Products<br><br></h5>
                                <span class="title is-4"><?php echo $total_products; ?></span>
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
                                <span class="title is-4"><?php echo $total_sold; ?></span>
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
                                <span class="title is-4"><?php echo $total_categories; ?></span>
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
                                <span class="title is-4"><?php echo $low_stock_count; ?></span>
                            </div>
                        </div>
                        <div class="cell is-col-span-3" style="height: 20vh;">
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
                                                <span class=" title is-5">Category:<br><b><?php echo $total_categories; ?></b></span>
                                    </span>

                                    <span class="icon-text mr-6">
                                        <span class="icon is-large has-text-primary">
                                            <i class="fas fa-2x fas fa-tag""></i>
                                                </span>
                                                <span class=" title is-5">Suppliers:<br><b><?php echo $total_supplier; ?></b></span>
                                    </span>
                                </div>
                            </div>
                        </div>



                        <div class="cell is-col-span-3 is-row-span-2">
                            <div class="box" style="height:100%;">
                                <span class="has-text-weight-bold has-text-danger">
                                    Low Stock Products
                                </span>
                                <div class="scrollable-table">
                                    <table class="table is-fullwidth">
                                        <thead>
                                            <tr>
                                                <td>ID</td>
                                                <td>Product</td>
                                                <td>Stocks</td>
                                                <td>Price</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = $lowStockResult->fetch_assoc()) : ?>
                                                <tr>
                                                    <td class="has-text-weight-semibold"><?php echo $row['ID']; ?></td>
                                                    <td><?php echo $row['Product']; ?></td>
                                                    <td class=""><?php echo $row['Stocks']; ?></td>
                                                    <td class="">₱<?php echo number_format($row['Price'], 2); ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="cell is-col-span-2 is-row-span-2">
                            <div class="box">
                                <span class="has-text-weight-bold has-text-success">
                                    New Arrival
                                </span><span><?php echo "as of " . date("F d, Y"); ?></span>
                                <div class="scrollable-table">
                                    <table class="table is-narrow">
                                        <thead>
                                            <tr>
                                                <td>ID</td>
                                                <td>Product</td>
                                                <td>Supplier</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = $newarrivalResult->fetch_assoc()) : ?>
                                                <tr>
                                                    <td class="has-text-weight-semibold"><?php echo $row['product_id']; ?></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td class=""><?php echo $row['supplier_name']; ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="cell is-col-span-2" style="height: 20vh;">
                            <div class="box">
                                <span class="title is-4">Search Product:</span>
                                <input class="input mt-5" type="text" placeholder="Search">
                            </div>
                        </div> -->
                        <div class="cell" style="height: 20vh;">
                            <a id="removeProduct-modal-button" class="icon-text-stack box">
                                <span class="fa-stack fa-2x has-text-primary">
                                    <i class="far fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-trash fa-stack-1x"></i>
                                </span>
                                <br>
                                <span class="title is-5">Pull Out Product</span>
                            </a>
                        </div>
                        <div class="cell" style="height: 20vh;">
                            <a id="addProduct-modal-button" class="icon-text-stack box">
                                <span class="fa-stack fa-2x has-text-primary">
                                    <i class="far fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-plus-square fa-stack-1x"></i>
                                </span>
                                <br>
                                <span class="title is-5">Add New Product</span>
                            </a>
                        </div>
                        <div class="cell is-col-span-2 is-row-span-1" style="height: 43vh;">
                            <div class="box">
                                <div class="container content is-large">
                                    <p class="title is-3">Top Suppliers:</p>
                                    <ol>
                                        <?php foreach ($total_topSupplier as $row) : ?>
                                            <li><?php echo $row['supplier_name']; ?></li>
                                        <?php endforeach; ?>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- MODALS -->
    <div id="addProduct-modal-content" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Add Product</p>
            <button id="close-modal-addProduct" class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <form action="forms/add-product.php" method="POST" enctype="multipart/form-data">
                <div class="field">
                    <label class="label">Product Name</label>
                    <div class="control">
                        <input class="input" type="text" name="product_name" placeholder="Enter product name" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Category</label>
                    <p class="control">
                        <span class="select is-fullwidth">
                            <select name="category">
                                <?php
                                // Assuming $conn is your database connection object
                                $query = "SELECT category_id, category_name FROM category";
                                $result = $conn->query($query);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </span>
                    </p>
                </div>

                <div class="field">
                    <label class="label">Supplier</label>
                    <p class="control">
                        <span class="select is-fullwidth">
                            <select name="supplier_id">
                                <?php
                                $query = "SELECT * FROM suppliers";
                                $result = $conn->query($query);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['supplier_id'] . "'>" . $row['supplier_name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </span>
                    </p>
                </div>

                <div class="field">
                    <label class="label">Image</label>
                    <div class="control">
                        <input class="input" type="file" name="image">
                    </div>
                </div>

                <div class="field-body">
                    <div class="field">
                        <label class="label">Quantity</label>
                        <div class="control">
                            <input class="input" type="number" name="quantity" placeholder="Enter quantity" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Price</label>
                        <div class="control">
                            <input class="input" type="number" name="price" placeholder="Enter price" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <button class="button is-primary" type="submit" name="submit">Add Product</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <footer class="modal-card-foot">
        </footer>
    </div>
</div>

    <div id="removeProduct-modal-content" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Remove Product</p>
                <button id="close-modal-removeProduct" class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <form action="forms/remove-product.php" method="POST" enctype="multipart/form-data">
                    <div class="field-body">
                        <div class="field">
                            <label class="label">Product ID</label>
                            <div class="control">
                                <input class="input" type="number" name="product_id" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Quantity</label>
                            <div class="control">
                                <input id="quantityInput" class="input" type="number" name="quantity" required>
                            </div>
                        </div>

                    </div>
                    <div class="field is-grouped is-grouped-right">
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox" name="remove_all">
                                All product?
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="control">
                        <button class="button is-primary" name="submit" type="submit">Remove Product</button>
                    </div>
                </form>
            </section>
            </section>
            <footer class="modal-card-foot">
            </footer>
        </div>
    </div>
</body>

</html>