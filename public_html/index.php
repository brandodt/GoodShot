<?php
session_start();
require_once "./includes/db.php";

$db = new Database();
$conn = $db->connect();

if (isset($_SESSION["error"])) {
    $error = $_SESSION["error"];
    unset($_SESSION["error"]);
}

if (isset($_GET['logout']) && $_GET['logout'] === 'success') {
    $error = "You have been logged out.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {

            $user = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header('location: admin/');
            } else if ($user['role'] == 'cashier') {
                header('location: cashier/');
            }
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Please fill in both fields.";
    }
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GoodShot - POS</title>
    <link rel="stylesheet" href="assets/css/bulma.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        html {
            background-color: #383736;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="columns is-centered centerall">
            <div class="column is-4 mx-6">
                <form class="box" method="POST" action="">
                    <div class="field">
                        <label class="label">Login</label>
                        <div class="control">
                            <input class="input" placeholder="Username" name="username" required />
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <input class="input" type="password" placeholder="Password" name="password" required />
                        </div>
                    </div>

                    <?php if (isset($error)) : ?>
                        <div class="notification is-danger is-light">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <div class="field">
                        <div class="control has-text-centered">
                            <button class="button is-primary is-rounded">Login</button>
                        </div>
                        <p id="forgetPassword" class="help has-text-centered is-clickable"><u>Forgot Password?</u></p>
                        <div id="passwordModal" class="modal">
                            <div class="modal-background"></div>
                            <div class="modal-card">
                                <header class="modal-card-head  mx-6">
                                    <p class="modal-card-title">Forgot Password</p>
                                </header>
                                <section class="modal-card-body  mx-6">
                                    <p class="has-text-centered">Contact your system administrator.</p>
                                </section>
                                <footer class="modal-card-foot has-text-centered  mx-6">
                                    <button class="button is-primary is-centered">Cancel</button>
                                </footer>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="./assets/js/login.modal.js"></script>
</body>

</html>