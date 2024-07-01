<?php
include '../includes/db/connection.php';
$db = new Database();
$conn = $db->connect();

// Fetch Supply
$supplies = "SELECT product_id, img_path, name, quantity FROM products";
$suppliesResult = $conn->query($supplies);

$conn->close();
?>


<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supplies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bulma/bulma.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/sortable.js"></script>
    <style>
        .nigger {
            display: grid;
            height: 43vh;
        }

        .niggus {
            display: grid;
            height: 40vh;
        }

        .scrollable-table {
            height: 55vh;
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
                        <li class="pt-2"><a href="index.php" class="has-background-grey-light has-text-white nice">Dashboard</a>
                        </li>
                        <li class="pt-2"><a href="sales-mgmt.php" class="has-background-grey-light has-text-white nice">Sales
                                Management</a></li>
                    </ul>
                    <hr>
                    <p class="menu-label has-text-white">Storage</p>
                    <ul class="menu-list">
                        <li class="pt-2">
                            <a href="inventory.php" class="has-background-grey-light has-text-white nice">Inventory</a>
                            <ul>
                                <li class="py-2"><a href="product.php" class="has-background-grey-light has-text-white nice">Product</a>
                                </li>
                                <li class="py-2"><a href="#" class="has-background-primary has-text-white">Supplies</a>
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
            <div class="column is-10    ">
                <h1 class="title has-text-white">Supplies</h1>
                <div class="columns">
                    <div class="negar column is-9">
                        <div class="box">
                            <div class="container">

                                <div class="field">
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Search">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <div class="select">
                                            <select>
                                                <option>Select dropdown</option>
                                                <option>ID</option>
                                                <option>Category</option>
                                                <option>Product</option>
                                                <option>Brand</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="field">
                                    <div class="control">
                                        <label class="radio">
                                            <input type="radio" name="question">
                                            Ascending
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="question">
                                            Descending
                                        </label>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                    <div class="negar column is-3">
                        <div class="box">
                            <div class="container" id="sortTools">
                                <div class="buttons">
                                    <button class="button is-primary">
                                        <span class="icon is-small">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span>Add Item</span>
                                    </button>
                                </div>
                                <div class="buttons" id="setOfButtons2">
                                    <button class="button is-dark">Sort</button>
                                    <button class="button is-primary">
                                        <span class="icon is-small">
                                            <i class="fas fa-redo-alt"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
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
                                            <th>Product ID</th>
                                            <th>Image Path</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $suppliesResult->fetch_assoc()) : ?>
                                            <tr>
                                                <td><?php echo $row['product_id']; ?></td>
                                                <td><img src="<?php echo $row['img_path']; ?>" alt="Product Image" width="50"></td>
                                                <td class="has-text-weight-semibold"><?php echo $row['name']; ?></td>
                                                <td class="has-text-weight-semibold"><?php echo $row['quantity']; ?></td>
                                                <td>
                                                    <span class="tag <?php echo $row['quantity'] > 0 ? 'is-success' : 'is-danger'; ?>">
                                                        <?php echo $row['quantity'] > 0 ? 'In Stock' : 'Out of Stock'; ?>
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
</body>

</html>