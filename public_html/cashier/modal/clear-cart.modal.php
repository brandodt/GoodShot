<?php
session_start();

if (!isset($_SESSION["username"]) && $_SESSION["role"] !== "cashier") {
    $_SESSION["error"] = "Unauthorized access. Please login first.";
    header("location: ../../index.php");
    exit;
}
?>
<div id="clear-cart-modal-content" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Clear Cart</p>
            <!-- <button id="close-clear-cart" class="delete" aria-label="close"></button> -->
        </header>
        <section class="modal-card-body">
            <div class="columns">
                <div class="column is-12">
                    <h5 class="title is-5">Are you sure you want to remove all the item in the cart?</h5>
                </div>
            </div>
        </section>
        <footer class="modal-card-foot">
            <div class="columns">
                <div class="column is-6"><button class="button is-danger is-fullwidth is-medium">Yes</button></div>
                <div class="column is-6"><button id="close-clear-cart" class="button is-primary is-fullwidth is-medium">No</button></div>
            </div>
        </footer>
    </div>
</div>