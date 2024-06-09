<?php
session_start();

if (!isset($_SESSION["username"]) && $_SESSION["role"] !== "cashier") {
    $_SESSION["error"] = "Unauthorized access. Please login first.";
    header("location: ../../index.php");
    exit;
}
?>

<div id="search-modal-content" class="modal">
    <div class="modal-background"></div>
    <div class="notification is-danger" v-if="notification">
        {{ notification }}
    </div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Search</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <div class="field">
                <div class="control is-expanded">
                    <input class="input" type="text" v-model="searchQuery" placeholder="Product ID / Product Name">
                </div>
            </div>
            <div v-if="searched && products.length === 0" class="notification is-warning">
                No products found.
            </div>
            <table class="table is-bordered is-fullwidth">
                <tbody>
                    <tr v-for="product in products" :key="product.product_id">
                        <td>{{ product.name }}</td>
                        <td>
                            <button class="button is-success is-light is-small is-fullwidth" @click="addToCart(product)">
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