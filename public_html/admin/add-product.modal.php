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