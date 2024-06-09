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
<div id="payment-modal-content" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Settle Payment</p>
            <button id="close-payment" class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <input name="totalAmount" type="number" class="input is-large is-rounded has-text-right" value="43500" disabled>
            <input name="cashAmount" type="number" class="input is-large is-rounded mt-2 has-text-right" value="50000" readonly>
            <input name="changeAmount" type="number" class="input is-large is-rounded mt-2 has-text-right" value="6500" disabled>
            <br>
            <br>
            <div class="columns is-multiline">
                <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4" onclick="updateCashAmount(7)">7</button></div>
                <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4" onclick="updateCashAmount(8)">8</button></div>
                <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4" onclick="updateCashAmount(9)">9</button></div>
                <div class="column is-one-quarter"><button class="button is-danger is-light is-fullwidth py-4" onclick="clearCashAmount()">C</button></div>
                <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4" onclick="updateCashAmount(4)">4</button></div>
                <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4" onclick="updateCashAmount(5)">5</button></div>
                <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4" onclick="updateCashAmount(6)">6</button></div>
                <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4" onclick="updateCashAmount(0)">0</button></div>
                <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4" onclick="updateCashAmount(1)">1</button></div>
                <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4" onclick="updateCashAmount(2)">2</button></div>
                <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4" onclick="updateCashAmount(3)">3</button></div>
                <div class="column is-one-quarter"><button class="button is-link is-fullwidth py-4" onclick="updateCashAmount('00')">00</button></div>
            </div>
            <div class="columns is-centered">
                <div class="column is-12"><button class="button is-primary is-fullwidth">Confirm</button></div>
            </div>
        </section>
        <footer class=" modal-card-foot">
        </footer>
    </div>
</div>