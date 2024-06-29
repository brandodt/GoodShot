<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["username"]) && $_SESSION["role"] !== "cashier") {
    $_SESSION["error"] = "Unauthorized access. Please login first.";
    header("location: ../../index.php");
    exit;
}
?>
<div id="search-modal-content" class="modal">
    <div class="modal-background"></div>
    <div class="notification" :class="{'is-danger': notificationType === 'danger', 'is-success': notificationType === 'success'}" v-if="notification" v-html="notification">
    </div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Search</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <div class="field">
                <div class="control is-expanded">
                    <input class="input" type="text" v-model="searchQuery" placeholder="Product ID / Name / Category">
                </div>
            </div>
            <div v-if="products.length === 0" class="notification is-warning">
                No products found.
            </div>
            <table class="table is-bordered is-fullwidth">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Item</th>
                        <th>Stock</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in products" :key="product.product_id">
                        <td>{{ product.name }}</td>
                        <td><img :src="product.img_path" alt="Product Image" style="max-width: 100px;"></td>
                        <td>{{ product.quantity }}</td>
                        <td>
                            <input type="number" class="input" style="width: 75%;" v-model.number="product.quantityToAdd" :class="{'is-danger': product.quantityToAdd > stockData[product.product_id]}">
                        </td>
                        <td>
                            <button class="button is-success is-light is-fullwidth" @click="addToCart(product)">
                                <span class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </span>
                                <span>
                                    Add to Cart
                                </span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <footer class="modal-card-foot">
        </footer>
    </div>
</div>