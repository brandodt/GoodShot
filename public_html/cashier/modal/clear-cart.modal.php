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
<div id="clear-cart-modal-content" class="modal" :class="{ 'is-active': isClearCartModalActive }">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Clear Cart</p>
        </header>
        <section class="modal-card-body">
            <div class="columns">
                <div class="column is-12">
                    <h6 class="title is-6">Are you sure you want to remove all the items in the cart?</h6>
                </div>
            </div>
        </section>
        <footer class="modal-card-foot">
            <div class="columns">
                <div class="column is-6"><button class="button is-danger" @click="openPasswordModal">Yes</button></div>
                <div class="column is-6"><button class="button is-primary" @click="closeClearCartModal">No</button></div>
            </div>
        </footer>
    </div>
</div>

<div id="password-modal-content" class="modal" :class="{ 'is-active': isPasswordModalActive }">
    <div class="modal-background" @click="closePasswordModal"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Enter Admin Password</p>
            <button class="delete" aria-label="close" @click="closePasswordModal"></button>
        </header>
        <section class="modal-card-body">
            <div class="columns">
                <div class="column is-12">
                    <input type="password" v-model="adminPassword" class="input" placeholder="Enter password">
                </div>
            </div>
        </section>
        <footer class="modal-card-foot">
            <div class="columns">
                <div class="column is-6"><button class="button is-danger" @click="confirmClearCart">Confirm</button></div>
                <div class="column is-6"><button class="button is-primary" @click="closePasswordModal">Cancel</button></div>
            </div>
        </footer>
    </div>
</div>