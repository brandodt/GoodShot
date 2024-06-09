<?php
session_start();

if (!isset($_SESSION["username"]) && $_SESSION["role"] !== "cashier") {
    $_SESSION["error"] = "Unauthorized access. Please login first.";
    header("location: ../../index.php");
    exit;
}
?>
<div id="account-modal-content" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Settings</p>
        </header>
        <section class="modal-card-body">
            <div class="columns">
                <div class="column is-4">
                    <aside class="menu has-text-centered">
                        <ul class="menu-list">
                            <li><a id="notifications" class="is-active py-4">Notifications</a></li>
                            <li><a id="account">Account</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="column is-8">
                    <div class="notification is-success">
                        New stock of <strong>product_name</strong> has arrived.
                    </div>
                    <div class="notification is-danger">
                        No stock <strong>product_name</strong>
                    </div>
                    <div class="notification is-warning">
                        Low stock <strong>product_name</strong>
                    </div>
                </div>
            </div>
        </section>
        <footer class="modal-card-foot">
            <div class="field is-grouped">
                <p class="control">
                    <button class="button is-primary">
                        Cancel
                    </button>
                </p>
                <p class="control">
                    <button class="button is-danger is-light" onclick="logout()">
                        Logout
                    </button>
                </p>
            </div>
        </footer>
    </div>
</div>